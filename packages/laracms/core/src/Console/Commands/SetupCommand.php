<?php

namespace LaraCms\Core\Console\Commands;

use Illuminate\Console\Command;

class SetupCommand extends Command
{
    protected $signature = 'laracms:setup';
    protected $description = 'Setup LaraCMS';

    public function handle(): int
    {
        $this->info('🚀 Setting up LaraCMS...');
        $this->newLine();
        
        // 1. Check .env
        if (!file_exists(base_path('.env'))) {
            copy(base_path('.env.example'), base_path('.env'));
            $this->call('key:generate');
            $this->info('✓ Environment file created');
        }
        
        // 2. Publish Fortify config
        $this->setupFortify();
        
        // 3. Run migrations
        $this->comment('Running migrations...');
        $this->call('migrate');
        $this->info('✓ Migrations completed');
        
        // 4. Create admin user
        $this->createAdminUser();
        
        $this->newLine();
        $this->info('✅ LaraCMS setup complete!');
        $this->newLine();
        $this->line('Next steps:');
        $this->line('  1. php artisan serve');
        $this->line('  2. Visit http://localhost:8000/login');
        $this->newLine();
        
        return self::SUCCESS;
    }
    
    protected function setupFortify(): void
    {
        $this->comment('Setting up authentication...');
        
        if (!file_exists(config_path('fortify.php'))) {
            $this->call('vendor:publish', [
                '--provider' => 'Laravel\Fortify\FortifyServiceProvider'
            ]);
            $this->info('✓ Fortify installed');
        } else {
            $this->info('✓ Fortify already configured');
        }
    }
    
    protected function createAdminUser(): void
    {
        $this->comment('Creating admin user...');
        
        // Check if admin exists
        if (\App\Models\User::where('role', 'admin')->exists()) {
            $this->info('✓ Admin user already exists');
            return;
        }
        
        $name = $this->ask('Admin name', 'Admin');
        $email = $this->ask('Admin email', 'admin@example.com');
        $password = $this->secret('Admin password (min. 8 characters)');

        if (strlen($password) < 8) {
            $this->error('Password must be at least 8 characters');
            $this->createAdminUser();
            return;
        }

        try {
            \App\Models\User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);
            
            $this->info('✓ Admin user created');
        } catch (\Exception $e) {
            $this->error('Failed to create admin user: ' . $e->getMessage());
        }
    }
}