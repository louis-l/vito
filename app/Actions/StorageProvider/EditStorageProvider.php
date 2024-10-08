<?php

namespace App\Actions\StorageProvider;

use App\Models\StorageProvider;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class EditStorageProvider
{
    public function edit(StorageProvider $storageProvider, User $user, array $input): void
    {
        $storageProvider->profile = $input['name'];
        $storageProvider->project_id = isset($input['global']) && $input['global'] ? null : $user->current_project_id;

        $storageProvider->save();
    }

    /**
     * @throws ValidationException
     */
    public static function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
