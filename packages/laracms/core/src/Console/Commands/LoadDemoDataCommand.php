<?php

namespace Laracms\Core\Console\Commands;

use Illuminate\Console\Command;
use Laracms\Core\Database\Seeders\PagesSeeder;
use Laracms\Core\Models\Page;

class LoadDemoDataCommand extends Command
{
    protected $signature = 'laracms:demo 
                            {--fresh : Delete existing pages before loading demo data}';
    
    protected $description = 'Load LaraCMS demo pages';

    public function handle(): int
    {
        $this->info('📦 Loading LaraCMS demo data...');
        $this->newLine();

        // Warnung wenn Pages schon existieren
        if (Page::count() > 0 && !$this->option('fresh')) {
            $this->warn('⚠️  Pages already exist in the database!');
            $this->newLine();
            
            if (!$this->confirm('Do you want to delete existing pages and load demo data?', false)) {
                $this->info('Demo data loading cancelled.');
                return self::SUCCESS;
            }
            
            $this->deleteExistingPages();
        } elseif ($this->option('fresh')) {
            $this->deleteExistingPages();
        }

        // Demo Pages laden
        $this->loadDemoPages();

        // Zusammenfassung
        $this->showSummary();

        return self::SUCCESS;
    }

    protected function deleteExistingPages(): void
    {
        $this->comment('Deleting existing pages...');
        
        $count = Page::count();
        Page::truncate();
        
        $this->info("✓ Deleted {$count} page(s)");
    }

    protected function loadDemoPages(): void
    {
        $this->comment('Loading demo pages...');
        
        $seeder = new PagesSeeder();
        $seeder->run();
        
        $this->info('✓ Demo pages loaded');
    }

    protected function showSummary(): void
    {
        $this->newLine();
        $this->info('✅ Demo data loaded successfully!');
        $this->newLine();
        
        $totalPages = Page::count();
        $publishedPages = Page::where('is_published', true)->count();
        $draftPages = Page::where('is_published', false)->count();
        
        $this->line("📄 Total pages: {$totalPages}");
        $this->line("✓ Published: {$publishedPages}");
        $this->line("✗ Drafts: {$draftPages}");
        
        $this->newLine();
        $this->line('Example URLs:');
        
        // Zeige ein paar Beispiel-URLs
        $examplePages = Page::where('is_published', true)
            ->take(5)
            ->get(['title', 'url']);
        
        foreach ($examplePages as $page) {
            $this->line("  → {$page->url} ({$page->title})");
        }
        
        $this->newLine();
        $this->line('💡 Tip: Visit any URL to see the page!');
    }
}