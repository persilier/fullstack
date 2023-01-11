<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[
            \Spatie\Permission\PermissionRegistrar::class
        ]->forgetCachedPermissions();

        // EMPLOYEE
        $viewEmployee = 'view Employee';
        $addEmployee = 'add Employee';
        $editEmployee = 'edit Employee';
        $deleteEmployee = 'delete Employee';
        $importEmployee = 'import Employee';
        $exportEmployee = 'export Employee';

        // USERS
        $viewUser = 'view User';
        $addUser = 'add User';
        $editUser = 'edit User';
        $deleteUser = 'delete User';
        $importUser = 'import User';
        $exportUser = 'export User';
        // LEAVES
        $viewLeave = 'view Leave';
        $addLeave = 'add Leave';
        $editLeave = 'edit Leave';
        $deleteLeave = 'delete Leave';
        $importLeave = 'import Leave';
        $exportLeave = 'export Leave';

        // OBJECTIVES
        $viewObjective = 'view Objective';
        $addObjective = 'add Objective';
        $editObjective = 'edit Objective';
        $deleteObjective = 'delete Objective';
        $importObjective = 'import Objective';
        $exportObjective = 'export Objective';

        // TRAINING
        $viewTraining = 'view Training';
        $addTraining = 'add Training';
        $editTraining = 'edit Training';
        $deleteTraining = 'delete Training';
        $importTraining = 'import Training';
        $exportTraining = 'export Training';

        // PERFORMANCES
        $viewPerformance = 'view Performance';
        $addPerformance = 'add Performance';
        $editPerformance = 'edit Performance';
        $deletePerformance = 'delete Performance';
        $importPerformance = 'import Performance';
        $exportPerformance = 'export Performance';

        // SETTINGS
        $viewSettings = 'view Settings';
        $addSettings = 'add Settings';
        $editSettings = 'edit Settings';
        $deleteSettings = 'delete Settings';
        $importSettings = 'import Settings';
        $exportSettings = 'export Settings';

        // create permissions for Managing Users
        Permission::create(['guard_name' => 'web', 'name' => $addEmployee]);
        Permission::create(['guard_name' => 'web', 'name' => $editEmployee]);
        Permission::create(['guard_name' => 'web', 'name' => $deleteEmployee]);
        Permission::create(['guard_name' => 'web', 'name' => $viewEmployee]);
        Permission::create(['guard_name' => 'web', 'name' => $importEmployee]);
        Permission::create(['guard_name' => 'web', 'name' => $exportEmployee]);

        // create permissions for Managing Users
        Permission::create(['guard_name' => 'web', 'name' => $addUser]);
        Permission::create(['guard_name' => 'web', 'name' => $editUser]);
        Permission::create(['guard_name' => 'web', 'name' => $deleteUser]);
        Permission::create(['guard_name' => 'web', 'name' => $viewUser]);
        Permission::create(['guard_name' => 'web', 'name' => $importUser]);
        Permission::create(['guard_name' => 'web', 'name' => $exportUser]);

        // create permissions for Managing Leaves
        Permission::create(['guard_name' => 'web', 'name' => $addLeave]);
        Permission::create(['guard_name' => 'web', 'name' => $editLeave]);
        Permission::create(['guard_name' => 'web', 'name' => $deleteLeave]);
        Permission::create(['guard_name' => 'web', 'name' => $viewLeave]);
        Permission::create(['guard_name' => 'web', 'name' => $importLeave]);
        Permission::create(['guard_name' => 'web', 'name' => $exportLeave]);

        // create permissions for Managing Objectives
        Permission::create(['guard_name' => 'web', 'name' => $addObjective]);
        Permission::create(['guard_name' => 'web', 'name' => $editObjective]);
        Permission::create(['guard_name' => 'web', 'name' => $deleteObjective]);
        Permission::create(['guard_name' => 'web', 'name' => $viewObjective]);
        Permission::create(['guard_name' => 'web', 'name' => $importObjective]);
        Permission::create(['guard_name' => 'web', 'name' => $exportObjective]);

        // create permissions for Managing Trainings
        Permission::create(['guard_name' => 'web', 'name' => $addTraining]);
        Permission::create(['guard_name' => 'web', 'name' => $editTraining]);
        Permission::create(['guard_name' => 'web', 'name' => $deleteTraining]);
        Permission::create(['guard_name' => 'web', 'name' => $viewTraining]);
        Permission::create(['guard_name' => 'web', 'name' => $importTraining]);
        Permission::create(['guard_name' => 'web', 'name' => $exportTraining]);

        // create permissions for Managing Trainings
        Permission::create(['guard_name' => 'web', 'name' => $addPerformance]);
        Permission::create(['guard_name' => 'web', 'name' => $editPerformance]);
        Permission::create([
            'guard_name' => 'web',
            'name' => $deletePerformance,
        ]);
        Permission::create(['guard_name' => 'web', 'name' => $viewPerformance]);
        Permission::create([
            'guard_name' => 'web',
            'name' => $importPerformance,
        ]);
        Permission::create([
            'guard_name' => 'web',
            'name' => $exportPerformance,
        ]);

        // create permissions for Managing Settings
        Permission::create(['guard_name' => 'web', 'name' => $addSettings]);
        Permission::create(['guard_name' => 'web', 'name' => $editSettings]);
        Permission::create(['guard_name' => 'web', 'name' => $deleteSettings]);
        Permission::create(['guard_name' => 'web', 'name' => $viewSettings]);
        Permission::create(['guard_name' => 'web', 'name' => $importSettings]);
        Permission::create(['guard_name' => 'web', 'name' => $exportSettings]);

        // Define available Roles
        $super_admin = 'superAdmin';
        $admin = 'admin';
        $manager = 'manager';
        $employee = 'employee';
        $rh = 'rh';
        $auditor = 'auditor';

        Role::create([
            'guard_name' => 'web',
            'name' => $super_admin,
        ])->givePermissionTo(Permission::all());
        Role::create([
            'guard_name' => 'web',
            'name' => $admin,
        ])->givePermissionTo([
            $viewEmployee,
            $addEmployee,
            $editEmployee,
            $deleteObjective,
            $exportEmployee,
            $viewLeave,
            $addLeave,
            $editLeave,
            $exportLeave,
            $viewObjective,
            $addObjective,
            $editObjective,
            $exportObjective,
            $viewTraining,
            $addTraining,
            $editTraining,
            $exportTraining,
            $viewPerformance,
            $addPerformance,
            $editPerformance,
            $exportPerformance,
            $viewSettings,
        ]);
        Role::create([
            'guard_name' => 'web',
            'name' => $manager,
        ])->givePermissionTo([
            $viewEmployee,
            $addEmployee,
            $editEmployee,
            $exportEmployee,
            $viewLeave,
            $addLeave,
            $editLeave,
            $exportLeave,
            $viewObjective,
            $addObjective,
            $editObjective,
            $exportObjective,
            $viewTraining,
            $addTraining,
            $editTraining,
            $exportTraining,
            $viewPerformance,
            $addPerformance,
            $editPerformance,
            $exportPerformance,
        ]);
        Role::create(['guard_name' => 'web', 'name' => $rh])->givePermissionTo([
            $viewEmployee,
            $addEmployee,
            $editEmployee,
            $exportEmployee,
            $viewLeave,
            $addLeave,
            $editLeave,
            $exportLeave,
            $viewObjective,
            $addObjective,
            $editObjective,
            $exportObjective,
            $viewTraining,
            $addTraining,
            $editTraining,
            $exportTraining,
            $viewPerformance,
            $addPerformance,
            $editPerformance,
            $exportPerformance,
        ]);
        Role::create([
            'guard_name' => 'web',
            'name' => $employee,
        ])->givePermissionTo([
            $viewEmployee,
            $editEmployee,
            $viewLeave,
            $addLeave,
            $viewObjective,
            $editObjective,
            $exportObjective,
            $viewTraining,
            $exportTraining,
            $viewPerformance,
            $editPerformance,
            $exportPerformance,
        ]);
        Role::create([
            'guard_name' => 'web',
            'name' => $auditor,
        ])->givePermissionTo([
            $viewEmployee,
            $viewLeave,
            $viewObjective,
            $viewTraining,
            $viewPerformance,
        ]);
    }
}
