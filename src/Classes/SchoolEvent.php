<?php

declare(strict_types=1);

namespace App\Classes;

use App\Annotation as IS;
use DateTime;

/**
 * Class SchoolEvent
 *
 * @IS\DTO
 */
class SchoolEvent extends CalendarEvent
{
    /**
     * Creates a new school event from a given school id and a given calendar event.
     * @param int $schoolId
     * @param CalendarEvent $event
     * @return SchoolEvent
     */
    public static function createFromCalendarEvent(CalendarEvent $event): SchoolEvent
    {
        $schoolEvent = new SchoolEvent();
        foreach (get_object_vars($event) as $key => $name) {
            $schoolEvent->$key = $name;
        }
        return $schoolEvent;
    }

    /**
     * This information is not available to un-privileged users
     */
    public function clearDataForUnprivilegedUsers()
    {
        $this->instructionalNotes = null;
        $this->clearDataForDraftOrScheduledEvent();
        $this->removeMaterialsInDraft();
        $this->clearMaterials();
    }

    /**
     * Blanks this event's learning materials.
     */
    protected function clearMaterials(): void
    {
        /** @var UserMaterial $lm */
        foreach ($this->learningMaterials as $lm) {
            $lm->clearMaterial();
        }
    }
}
