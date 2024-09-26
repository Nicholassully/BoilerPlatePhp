<?php

declare(strict_types=1);

namespace BoilerPlatePhp;

use Carbon\Carbon;

class CallBack
{
    private string $dateCallBackRequested;

    private string $timeCallBackRequested;

    private string $dateUserMadeContact;

    private string $timeUserMadeContact;

    private Carbon $callCenterOpeningTime;

    private Carbon $latestCallCenterClosingTime;

    private Carbon $changeDateCallBackRequestedToACarbonDate;

    private Carbon $changeTimeCallBackRequestedToACarbonDate;

    public function __construct(
        string $dateCallBackRequested,
        string $timeCallBackRequested,
        string $dateUserMadeContact,
        string $timeUserMadeContact
    ) {
        $this->dateCallBackRequested = $dateCallBackRequested;
        $this->timeCallBackRequested = $timeCallBackRequested;
        $this->dateUserMadeContact = $dateUserMadeContact;
        $this->timeUserMadeContact = $timeUserMadeContact;
    }

    public function getDateCallBackRequested(): string
    {
        return $this->dateCallBackRequested;
    }

    public function getTimeCallBackRequested(): string
    {
        return $this->timeCallBackRequested;
    }

    public function getDateUserMadeContact(): string
    {
        return $this->dateUserMadeContact;
    }

    public function getTimeUserMadeContact(): string
    {
        return $this->timeUserMadeContact;
    }

    public function isDateAndTimeForCallBackRequestValid(): bool
    {
        $timeUserMadeContactWithTwoHoursAdded = Carbon::parse($this->getTimeUserMadeContact())->addHours(2);
        $this->changeDateCallBackRequestedToACarbonDate = Carbon::parse($this->getDateCallBackRequested());
        $this->changeTimeCallBackRequestedToACarbonDate = Carbon::parse($this->getTimeCallBackRequested());
        $this->callCenterOpeningTime = Carbon::parse('09:00:00');
        $this->latestCallCenterClosingTime = Carbon::parse('20:00:00');
        $howManyDaysInTheFuture = $this->changeDateCallBackRequestedToACarbonDate->diffInDays(
            $this->getDateUserMadeContact()
        );

        if ($this->getDateCallBackRequested() < $this->getDateUserMadeContact()) {
            return false;
        }

        if (!$this->changeTimeCallBackRequestedToACarbonDate->between(
            $this->latestCallCenterClosingTime,
            $this->callCenterOpeningTime
        )
        ) {
            return false;
        }

        if ($this->changeDateCallBackRequestedToACarbonDate->isSunday()) {
            return false;
        }

        if ($howManyDaysInTheFuture > 6) {
            return false;
        }

        if ($this->getDateUserMadeContact() === $this->changeDateCallBackRequestedToACarbonDate->toDateString()) {
            if ($this->changeTimeCallBackRequestedToACarbonDate->greaterThan($timeUserMadeContactWithTwoHoursAdded)) {
                $this->checkDayAndTimeOfRequestAgainstOpeningHours();
            }
            return false;
        } else {
            $this->checkDayAndTimeOfRequestAgainstOpeningHours();
        }

        return true;
    }

    private function checkDayAndTimeOfRequestAgainstOpeningHours()
    {
        if ($this->changeDateCallBackRequestedToACarbonDate->isMonday()
            || $this->changeDateCallBackRequestedToACarbonDate->isTuesday()
            || $this->changeDateCallBackRequestedToACarbonDate->isWednesday()
        ) {
            if ($this->changeTimeCallBackRequestedToACarbonDate->between(
                $this->callCenterOpeningTime,
                Carbon::parse('18:00:00')
            )
            ) {
                return true;
            }
            return false;
        }
        if ($this->changeDateCallBackRequestedToACarbonDate->isThursday()
            || $this->changeDateCallBackRequestedToACarbonDate->isFriday()
        ) {
            if ($this->changeTimeCallBackRequestedToACarbonDate->between(
                $this->callCenterOpeningTime,
                $this->latestCallCenterClosingTime
            )
            ) {
                return true;
            }
            return false;
        }
        if ($this->changeDateCallBackRequestedToACarbonDate->isSaturday()) {
            if ($this->changeTimeCallBackRequestedToACarbonDate->between(
                $this->callCenterOpeningTime,
                Carbon::parse('12:30:00')
            )
            ) {
                return true;
            }
            return false;
        }
    }
}
