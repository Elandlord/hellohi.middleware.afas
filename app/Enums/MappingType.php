<?php namespace App\Enums;

abstract class MappingType extends Enum {
    const PERSON = "person";
    const ORGANISATION = "organisation";
    // const DEFAULT_PERSON = "default_person";
    // const TASK = "task";
    const ALL = [
        MappingType::PERSON,
        MappingType::ORGANISATION,
    ];
}