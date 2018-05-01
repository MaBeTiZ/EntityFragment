# EntityFragment

Provides reusable features as Traits for Entities in Symfony 4.

Uses Doctrine.

## List of available fragments (Traits)

* CreatedAtUpdatedAtTrait
    * \DateTime $createdAt (on create)
    * \DateTime $updatedAt (on update)
* StateTrait
    * int $state - A static array $availableStates has to be defined in the parent Entity (please, do NOT use the 0 key value)
* StatusTrait
    * bool $status (on/off)

## ToDo List of fragments

* User (login/pwd)
* People (gender, title, name, firstname, birthdate)
* ContactInfo (phone, mobilephone, email)
* Address (address1, address2, city, zipcode)
* Geolocation (latt, long, alt)
