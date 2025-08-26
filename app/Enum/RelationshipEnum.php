<?php

namespace App\Enum;

class RelationshipEnum
{
    const MOTHER_FATHER_CODE = '001';
    const GRANDMOTHER_GRANDFATHER_CODE = '002';
    const AUNT_UNCLE_CODE = '003';
    const SISTER_BROTHER_CODE = '004';

    const MOTHER_FATHER_LABEL = 'Mãe/Pai';
    const GRANDMOTHER_GRANDFATHER_LABEL = 'Avó/Avô';
    const AUNT_UNCLE_LABEL = 'Tia/Tio';
    const SISTER_BROTHER_LABEL = 'Irmã/Irmão';

    public static function listCodes(): array
    {
        return [
            self::MOTHER_FATHER_CODE,
            self::GRANDMOTHER_GRANDFATHER_CODE,
            self::AUNT_UNCLE_CODE,
            self::SISTER_BROTHER_CODE
        ];
    }
}
