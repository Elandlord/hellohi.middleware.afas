<?php namespace App\Models\API;

class Person
{
    private $id;
    private $salutation;
    private $initials;
    private $first_name;
    private $last_name;
    private $insertion;
    private $gender;
    private $bio;
    private $date_of_birth;
    private $phone_number_private;
    private $email_private;
    private $address;
    private $address2;
    private $district;
    private $city;
    private $postal_code;
    private $user_id;
    private $created_at;
    private $updated_at;

    public static function fromJSONObject($object)
    {
        $person = new Person();
        $person->setValues($object);
        return $person;
    }

    public static function fromArray($object)
    {
        $person = new Person();
        $person->setValuesFromArray($object);
        return $person;
    }

    public function setValues($object)
    {
        $this->setId($object->id);
        $this->setSalutation($object->salutation);
        $this->setInitials($object->initials);
        $this->setFirstName($object->first_name);
        $this->setLastName($object->last_name);
        $this->setInsertion($object->insertion);
        $this->setGender($object->gender);
        $this->setBio($object->bio);
        $this->setDateOfBirth($object->date_of_birth);
        $this->setPhoneNumberPrivate($object->phone_number_private);
        $this->setEmailPrivate($object->email_private);
        $this->setAddress($object->address);
        $this->setAddress2($object->address2);
        $this->setDistrict($object->district);
        $this->setCity($object->city);
        $this->setPostalCode($object->postal_code);
        $this->setUserId($object->user_id);
        $this->setCreatedAt($object->created_at);
        $this->setUpdatedAt($object->updated_at);
        return $this;
    }

    public function setValuesFromArray($object)
    {
        $this->setId($object['id']);
        $this->setSalutation($object['salutation']);
        $this->setInitials($object['initials']);
        $this->setFirstName($object['first_name']);
        $this->setLastName($object['last_name']);
        $this->setInsertion($object['insertion']);
        $this->setGender($object['gender']);
        $this->setBio($object['bio']);
        $this->setDateOfBirth($object['date_of_birth']);
        $this->setPhoneNumberPrivate($object['phone_number_private']);
        $this->setEmailPrivate($object['email_private']);
        $this->setAddress($object['address']);
        $this->setAddress2($object['address2']);
        $this->setDistrict($object['district']);
        $this->setCity($object['city']);
        $this->setPostalCode($object['postal_code']);
        $this->setUserId($object['user_id']);
        $this->setCreatedAt($object['created_at']);
        $this->setUpdatedAt($object['updated_at']);
        return $this;
    }

    public function toArray()
    {
        $array = [];
        $array["id"] = $this->getId();
        $array["salutation"] = $this->getSalutation();
        $array["initials"] = $this->getInitials();
        $array["first_name"] = $this->getFirstName();
        $array["last_name"] = $this->getLastName();
        $array["insertion"] = $this->getInsertion();
        $array["gender"] = $this->getGender();
        $array["bio"] = $this->getBio();
        $array["date_of_birth"] = $this->getDateOfBirth();
        $array["phone_number_private"] = $this->getPhoneNumberPrivate();
        $array["email_private"] = $this->getEmailPrivate();
        $array["address"] = $this->getAddress();
        $array["address2"] = $this->getAddress2();
        $array["district"] = $this->getDistrict();
        $array["city"] = $this->getCity();
        $array["postal_code"] = $this->getPostalCode();
        $array["user_id"] = $this->getUserId();
        $array["created_at"] = $this->getCreatedAt();
        $array["updated_at"] = $this->getUpdatedAt();
        return $array;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param mixed $salutation
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

    /**
     * @return mixed
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * @param mixed $initials
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getInsertion()
    {
        return $this->insertion;
    }

    /**
     * @param mixed $insertion
     */
    public function setInsertion($insertion)
    {
        $this->insertion = $insertion;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * @param mixed $date_of_birth
     */
    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumberPrivate()
    {
        return $this->phone_number_private;
    }

    /**
     * @param mixed $phone_number_private
     */
    public function setPhoneNumberPrivate($phone_number_private)
    {
        $this->phone_number_private = $phone_number_private;
    }

    /**
     * @return mixed
     */
    public function getEmailPrivate()
    {
        return $this->email_private;
    }

    /**
     * @param mixed $email_private
     */
    public function setEmailPrivate($email_private)
    {
        $this->email_private = $email_private;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getStreetName()
    {
        if (preg_match('/^([^\d]*[^\d\s]) *(\d.*)$/', $this->address, $result)) {
            return $result[1];
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getStreetNumber()
    {
        if (preg_match('/^([^\d]*[^\d\s]) *(\d.*)$/', $this->address, $result)) {
            return $result[2];
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }
    
    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param mixed $postal_code
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}