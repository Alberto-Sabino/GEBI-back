<?php

namespace App\Http\Requests\GuardianChildLinks;

use App\Enum\RelationshipEnum;
use App\Http\Requests\BaseRequest;

class CreateGuardianChildLinkRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'guardian_id' => 'required|integer|exists:guardians,id',
            'child_id' => 'required|integer|exists:children,id',
            'relationship_code' => 'required|in:' . implode(',', RelationshipEnum::listCodes())
        ];
    }
}
