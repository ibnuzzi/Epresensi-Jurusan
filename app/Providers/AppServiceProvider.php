<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Repositories\ClassroomRepository;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Repositories\AttendanceRuleRepository;

class AppServiceProvider extends ServiceProvider
{

    private array $register = [
        UserInterface::class => UserRepository::class,
        ClassroomInterface::class => ClassroomRepository::class,
        AttendanceRuleInterface::class => AttendanceRuleRepository::class
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
