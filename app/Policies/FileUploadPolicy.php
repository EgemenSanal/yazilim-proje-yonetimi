<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\FileUpload;
use App\Models\Member;

class FileUploadPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Member $member): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Member $member, FileUpload $fileUpload): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Member $member): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Member $member, FileUpload $fileUpload): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Member $member, FileUpload $fileUpload): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Member $member, FileUpload $fileUpload): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Member $member, FileUpload $fileUpload): bool
    {
        return false;
    }
}
