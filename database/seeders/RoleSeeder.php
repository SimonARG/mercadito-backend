<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /*
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $role_admin = Role::create(['name' => 'admin']);
        $role_mod = Role::create(['name' => 'mod']);
        $role_sub = Role::create(['name' => 'sub']);
        $role_user = Role::create(['name' => 'user']);
        $role_new = Role::create(['name' => 'new']);
        $role_restricted = Role::create(['name' => 'restricted']);

        // Global post CRUD permissions
        $permission_create_posts = Permission::create(['name' => 'create posts']);
        $permission_read_posts = Permission::create(['name' => 'read posts']);
        $permission_update_posts = Permission::create(['name' => 'update posts']);
        $permission_delete_posts = Permission::create(['name' => 'delete posts']);

        // Own post permissions
        $permission_update_own_posts = Permission::create(['name' => 'update own posts']);
        $permission_delete_own_posts = Permission::create(['name' => 'delete own posts']);

        // Limit post creation for non-subscribed users
        $permission_create_three_posts = Permission::create(['name' => 'create three posts']);

        // Like and dislike posts
        $permission_like_posts = Permission::create(['name' => 'like posts']);

        // Global comment CRUD permissions
        $permission_create_comments = Permission::create(['name' => 'create comments']);
        $permission_read_comments = Permission::create(['name' => 'read comments']);
        $permission_update_comments = Permission::create(['name' => 'update comments']);
        $permission_delete_comments = Permission::create(['name' => 'delete comments']);

        // Own comment permissions
        $permission_update_own_comments = Permission::create(['name' => 'update own comments']);
        $permission_delete_own_comments = Permission::create(['name' => 'delete own comments']);

        // Profile permissions
        $permission_read_profile = Permission::create(['name' => 'read profile']);
        $permission_update_profile = Permission::create(['name' => 'update profile']);
        $permission_delete_profile = Permission::create(['name' => 'delete profile']);

        // Change avatar rule for new & restricted users
        $permission_change_avatar = Permission::create(['name' => 'change avatar']);

        // Global user CRUD permissions
        $permission_create_user = Permission::create(['name' => 'create user']);
        $permission_read_user = Permission::create(['name' => 'read user']);
        $permission_update_user = Permission::create(['name' => 'update user']);
        $permission_delete_user = Permission::create(['name' => 'delete user']);

        // Assigning permissions to groups
        $permissions_mod = [
            $permission_create_posts,
            $permission_read_posts,
            $permission_update_posts,
            $permission_delete_posts,
            $permission_create_comments,
            $permission_read_comments,
            $permission_update_comments,
            $permission_delete_comments,
            $permission_read_profile,
            $permission_update_profile,
            $permission_delete_profile,
            $permission_like_posts,
            $permission_create_user,
            $permission_read_user,
            $permission_update_user,
            $permission_delete_user,
            $permission_change_avatar
        ];

        $permissions_sub = [
            $permission_create_posts,
            $permission_read_posts,
            $permission_update_own_posts,
            $permission_delete_own_posts,
            $permission_create_comments,
            $permission_read_comments,
            $permission_update_own_comments,
            $permission_delete_own_comments,
            $permission_read_profile,
            $permission_update_profile,
            $permission_delete_profile,
            $permission_like_posts,
            $permission_change_avatar
        ];

        $permissions_user = [
            $permission_create_three_posts,
            $permission_read_posts,
            $permission_update_own_posts,
            $permission_delete_own_posts,
            $permission_create_comments,
            $permission_read_comments,
            $permission_update_own_comments,
            $permission_delete_own_comments,
            $permission_read_profile,
            $permission_update_profile,
            $permission_delete_profile,
            $permission_like_posts,
            $permission_change_avatar
        ];

        $permissions_new = [
            $permission_create_three_posts,
            $permission_read_posts,
            $permission_update_own_posts,
            $permission_delete_own_posts,
            $permission_create_comments,
            $permission_read_comments,
            $permission_update_own_comments,
            $permission_delete_own_comments,
            $permission_read_profile,
            $permission_update_profile,
            $permission_delete_profile, 
            $permission_like_posts
        ];

        $permissions_restricted = [
            $permission_like_posts,
            $permission_read_posts,
            $permission_read_comments,
            $permission_read_profile,
            $permission_read_user
        ];

        // Assigning permission groups to roles
        $role_mod->syncPermissions($permissions_mod);
        $role_sub->syncPermissions($permissions_sub);
        $role_user->syncPermissions($permissions_user);
        $role_new->syncPermissions($permissions_new);
        $role_restricted->syncPermissions($permissions_restricted);
    }
}
