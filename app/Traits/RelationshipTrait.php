<?php

namespace App\Traits;

use App\Enum\RelationshipEnum;

trait RelationshipTrait
{
    /**
     * Get the relationship label based on the relationship code.
     *
     * @param RelationshipEnum $relationshipCode
     * @return string|null
     */
    public function getRelationshipLabel(RelationshipEnum|string $relationshipCode): ?string
    {
        return match ($relationshipCode) {
            RelationshipEnum::MOTHER_FATHER_CODE => RelationshipEnum::MOTHER_FATHER_LABEL,
            RelationshipEnum::GRANDMOTHER_GRANDFATHER_CODE => RelationshipEnum::GRANDMOTHER_GRANDFATHER_LABEL,
            RelationshipEnum::AUNT_UNCLE_CODE => RelationshipEnum::AUNT_UNCLE_LABEL,
            RelationshipEnum::SISTER_BROTHER_CODE => RelationshipEnum::SISTER_BROTHER_LABEL,
            default => null,
        };
    }
}
