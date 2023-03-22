<?php

declare(strict_types=1);

use App\Orchid\Screens\Calendar\Appointment\AppointmentEditScreen;
use App\Orchid\Screens\Calendar\Appointment\AppointmentListScreen;
use App\Orchid\Screens\Cars\Brand\BrandEditScreen;
use App\Orchid\Screens\Cars\Brand\BrandListScreen;
use App\Orchid\Screens\Cars\DriveType\DriveTypeEditScreen;
use App\Orchid\Screens\Cars\DriveType\DriveTypeListScreen;
use App\Orchid\Screens\Cars\FuelType\FuelTypeEditScreen;
use App\Orchid\Screens\Cars\FuelType\FuelTypeListScreen;
use App\Orchid\Screens\Cars\GearboxType\GearboxTypeEditScreen;
use App\Orchid\Screens\Cars\GearboxType\GearboxTypeListScreen;
use App\Orchid\Screens\Cars\Model\ModelEditScreen;
use App\Orchid\Screens\Cars\Model\ModelListScreen;
use App\Orchid\Screens\Customers\Car\CarEditScreen;
use App\Orchid\Screens\Customers\Car\CarListScreen;
use App\Orchid\Screens\Customers\Customer\CustomerEditScreen;
use App\Orchid\Screens\Customers\Customer\CustomerListScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\Fixes\Category\FixCategoryEditScreen;
use App\Orchid\Screens\Fixes\Category\FixCategoryListScreen;
use App\Orchid\Screens\Fixes\Fix\FixEditScreen;
use App\Orchid\Screens\Fixes\Fix\FixListScreen;
use App\Orchid\Screens\Fixes\Prices\FixPriceEditScreen;
use App\Orchid\Screens\Fixes\Prices\FixPriceListScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Preview\Calendar\CalendarScreen;
use App\Orchid\Screens\Preview\Fixes\CustomerFixListScreen;
use App\Orchid\Screens\Preview\Fixes\FixScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example screen'));

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

//Route::screen('idea', Idea::class, 'platform.screens.idea');

Route::screen('fix-category/{category?}', FixCategoryEditScreen::class)
    ->name('platform.fix_category.edit');

Route::screen('fix-categories', FixCategoryListScreen::class)
    ->name('platform.fix_category.list');

Route::screen('fix-price/{price?}', FixPriceEditScreen::class)
    ->name('platform.fix_price.edit');

Route::screen('fix-prices', FixPriceListScreen::class)
    ->name('platform.fix_price.list');

Route::screen('brand/{brand?}', BrandEditScreen::class)
    ->name('platform.brand.edit');

Route::screen('brands', BrandListScreen::class)
    ->name('platform.brand.list');

Route::screen('model/{model?}', ModelEditScreen::class)
    ->name('platform.model.edit');

Route::screen('models', ModelListScreen::class)
    ->name('platform.model.list');

Route::screen('drive-type/{driveType?}', DriveTypeEditScreen::class)
    ->name('platform.drive_type.edit');

Route::screen('drive-types', DriveTypeListScreen::class)
    ->name('platform.drive_type.list');

Route::screen('fuel-type/{fuelType?}', FuelTypeEditScreen::class)
    ->name('platform.fuel_type.edit');

Route::screen('fuel-types', FuelTypeListScreen::class)
    ->name('platform.fuel_type.list');

Route::screen('gearbox-type/{gearboxType?}', GearboxTypeEditScreen::class)
    ->name('platform.gearbox_type.edit');

Route::screen('gearbox-types', GearboxTypeListScreen::class)
    ->name('platform.gearbox_type.list');

Route::screen('customer/{customer?}', CustomerEditScreen::class)
    ->name('platform.customer.edit');

Route::screen('customer/{customer}/fixes', CustomerFixListScreen::class)
    ->name('platform.customer.fix.preview');

Route::screen('customers', CustomerListScreen::class)
    ->name('platform.customer.list');

Route::screen('car/{car?}', CarEditScreen::class)
    ->name('platform.car.edit');

Route::screen('cars', CarListScreen::class)
    ->name('platform.car.list');

Route::screen('preview/fix/{fix}', FixScreen::class)
    ->name('platform.fix.preview');

Route::screen('fix/{fix?}', FixEditScreen::class)
    ->name('platform.fix.edit');

Route::screen('fixes', FixListScreen::class)
    ->name('platform.fix.list');

Route::screen('appointment/{appointment?}', AppointmentEditScreen::class)
    ->name('platform.appointment.edit');

Route::screen('appointments', AppointmentListScreen::class)
    ->name('platform.appointment.list');

Route::screen('calendar', CalendarScreen::class)
    ->name('platform.calendar.preview');
