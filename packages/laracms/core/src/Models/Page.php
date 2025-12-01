<?php

namespace Laracms\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'url',
        'content',
        'is_published',
        'parent_id',
    ];

    protected $casts = [
        'content' => 'array',
        'is_published' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        // Slug auto-generieren aus Title (nur beim Erstellen)
        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
            
            // URL beim Erstellen generieren
            $page->url = $page->generateUrl();
        });

        // URL NUR neu generieren wenn slug oder parent_id geändert wurde
        static::updating(function ($page) {
            if ($page->isDirty('slug') || $page->isDirty('parent_id')) {
                $page->url = $page->generateUrl();
            }
        });

        // Children URLs updaten (nur wenn slug/parent_id geändert)
        static::updated(function ($page) {
            if ($page->wasChanged('slug') || $page->wasChanged('parent_id')) {
                $page->updateChildrenUrls();
            }
        });
    }

    /**
     * Generate full URL from slug and parents
     */
    public function generateUrl(): string
    {
        $segments = [$this->slug];
        
        $parent = $this->parent;
        
        while ($parent) {
            array_unshift($segments, $parent->slug);
            $parent = $parent->parent;
        }
        
        return '/' . implode('/', $segments);
    }

    /**
     * Update all children URLs recursively
     */
    public function updateChildrenUrls(): void
    {
        foreach ($this->children as $child) {
            $child->url = $child->generateUrl();
            $child->saveQuietly(); // Ohne Events!
            
            $child->updateChildrenUrls();
        }
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function ancestors()
    {
        $ancestors = collect();
        $parent = $this->parent;

        while ($parent) {
            $ancestors->push($parent);
            $parent = $parent->parent;
        }

        return $ancestors->reverse();
    }

    public function breadcrumbs(): array
    {
        return $this->ancestors()
            ->push($this)
            ->map(fn($page) => [
                'title' => $page->title,
                'url' => $page->url,
            ])
            ->toArray();
    }

    /**
     * Manually regenerate URL
     */
    public function regenerateUrl(): void
    {
        $this->url = $this->generateUrl();
        $this->saveQuietly();
    }

    /**
     * Regenerate URLs for entire tree
     */
    public function regenerateTreeUrls(): void
    {
        $this->regenerateUrl();
        
        foreach ($this->children as $child) {
            $child->regenerateTreeUrls();
        }
    }
}