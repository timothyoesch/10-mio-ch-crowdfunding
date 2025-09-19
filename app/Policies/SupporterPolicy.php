<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Supporter;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupporterPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Supporter');
    }

    public function view(AuthUser $authUser, Supporter $supporter): bool
    {
        return $authUser->can('View:Supporter');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Supporter');
    }

    public function update(AuthUser $authUser, Supporter $supporter): bool
    {
        return $authUser->can('Update:Supporter');
    }

    public function delete(AuthUser $authUser, Supporter $supporter): bool
    {
        return $authUser->can('Delete:Supporter');
    }

    public function restore(AuthUser $authUser, Supporter $supporter): bool
    {
        return $authUser->can('Restore:Supporter');
    }

    public function forceDelete(AuthUser $authUser, Supporter $supporter): bool
    {
        return $authUser->can('ForceDelete:Supporter');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Supporter');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Supporter');
    }

    public function replicate(AuthUser $authUser, Supporter $supporter): bool
    {
        return $authUser->can('Replicate:Supporter');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Supporter');
    }

}