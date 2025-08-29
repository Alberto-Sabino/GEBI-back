<?php

namespace App\Services\ClassRoomChildServices;

use App\Exceptions\TreatedException;
use App\Models\ClassRoomChild;
use App\Services\GuardianChildLinkServices\ListGuardianChildLinkByChildIdService;
use App\Traits\LoggedUserTrait;
use Illuminate\Support\Facades\Log;

class RegisterEntryClassRoomChildService
{
    use LoggedUserTrait;

    public function __construct(
        protected CreateClassRoomChildService $createClassRoomChildService,
        protected ListGuardianChildLinkByChildIdService $listGuardianChildLinkByChildIdService
    ) {}

    public function registerEntry(array $data): ClassRoomChild
    {
        $this->verifyGuardianChildLink($data);
        $this->addExtraInfos($data);

        return $this->createClassRoomChildService
            ->create($data);
    }

    private function verifyGuardianChildLink(array $data): void
    {
        $guardianChildLink = $this->listGuardianChildLinkByChildIdService
            ->list($data['child_id']);

        $hasLink = collect($guardianChildLink)
            ->contains('guardian_id', $data['guardian_id']);

        if (!$hasLink) {
            throw new TreatedException('O responsável e a criança informados não possuem vínculos entre si.', 400);
        }
    }

    private function addExtraInfos(array &$data): void
    {
        $data['entry_at'] = now()->format('H:i');
        $data['user_id'] = $this->getLoggedUserId();
    }
}
