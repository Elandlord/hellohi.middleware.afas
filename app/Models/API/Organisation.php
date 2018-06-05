<?php namespace App\Models\API;

class Organisation
{
    private $id;
    private $name;
    private $type;
    private $status;
    private $email;
    private $phone;
    private $website;
    private $address;
    private $address2;
    private $city;
    private $district;
    private $postal_code;
    private $country_code;
    private $mailing_address;
    private $mailing_address2;
    private $mailing_city;
    private $mailing_district;
    private $mailing_postal_code;
    private $mailing_country_code;
    private $fiscal_number;
    private $vat_number;
    private $tax_number;
    private $legal;
    private $bank_account;
    private $kvk;
    private $currency;
    private $pay_term;
    private $comment;
    private $location;
    private $branch_id;
    private $contact_person_id;
    private $created_at;
    private $updated_at;

    public static function fromJSONObject($object)
    {
        $organisation = new Organisation();
        $organisation->setValues($object);

        return $organisation;
    }

    public static function fromArray($object)
    {
        $organisation = new Organisation();
        $organisation->setValuesFromArray($object);
        return $organisation;
    }

    public function setValues($object)
    {
        $this->setId($object->id);
        $this->setName($object->name);
        $this->setType($object->type);
        $this->setStatus($object->status);
        $this->setEmail($object->email);
        $this->setPhone($object->phone);
        $this->setWebsite($object->website);
        $this->setAddress($object->address);
        $this->setAddress2($object->address2);
        $this->setDistrict($object->district);
        $this->setCity($object->city);
        $this->setPostalCode($object->postal_code);
        $this->setCountryCode($object->country_code);
        $this->setMailingAddress($object->mailing_address);
        $this->setMailingAddress2($object->mailing_address2);
        $this->setMailingCity($object->mailing_city);
        $this->setMailingDistrict($object->mailing_district);
        $this->setMailingPostalCode($object->mailing_postal_code);
        $this->setMailingCountryCode($object->mailing_country_code);
        $this->setFiscalNumber($object->fiscal_number);
        $this->setLegal($object->legal);
        $this->setBankAccount($object->bank_account);
        $this->setKvk($object->kvk);
        $this->setCurrency($object->currency);
        $this->setPayTerm($object->pay_term);
        $this->setComment($object->comment);
        $this->setLocation($object->location);
        $this->setCreatedAt($object->created_at);
        $this->setUpdatedAt($object->updated_at);
        return $this;
    }

    public function setValuesFromArray($object)
    {
        $this->setId($object['id']);
        $this->setName($object['name']);
        $this->setType($object['type']);
        $this->setStatus($object['status']);
        $this->setEmail($object['email']);
        $this->setPhone($object['phone']);
        $this->setWebsite($object['website']);
        $this->setAddress($object['address']);
        $this->setAddress2($object['address2']);
        $this->setDistrict($object['district']);
        $this->setCity($object['city']);
        $this->setPostalCode($object['postal_code']);
        $this->setCountryCode($object['country_code']);
        $this->setMailingAddress($object['mailing_address']);
        $this->setMailingAddress2($object['mailing_address2']);
        $this->setMailingCity($object['mailing_city']);
        $this->setMailingDistrict($object['mailing_district']);
        $this->setMailingPostalCode($object['mailing_postal_code']);
        $this->setMailingCountryCode($object['mailing_country_code']);
        $this->setFiscalNumber($object['fiscal_number']);
        $this->setLegal($object['legal']);
        $this->setBankAccount($object['bank_account']);
        $this->setKvk($object['kvk']);
        $this->setCurrency($object['currency']);
        $this->setPayTerm($object['pay_term']);
        $this->setComment($object['comment']);
        $this->setLocation($object['location']);
        $this->setContactPersonId($object['contact_person_id']);
        $this->setCreatedAt($object['created_at']);
        $this->setUpdatedAt($object['updated_at']);
        return $this;
    }

    public function toArray()
    {
        $array = [];
        $array["id"] = $this->getId();
        $array["name"] = $this->getName();
        $array["type"] = $this->getType();
        $array["status"] = $this->getStatus();
        $array["email"] = $this->getEmail();
        $array["phone"] = $this->getPhone();
        $array["website"] = $this->getWebsite();
        $array["address"] = $this->getAddress();
        $array["address2"] = $this->getAddress2();
        $array["district"] = $this->getDistrict();
        $array["city"] = $this->getCity();
        $array["postal_code"] = $this->getPostalCode();
        $array["country_code"] = $this->getCountryCode();
        $array["mailing_address"] = $this->getMailingAddress();
        $array["mailing_address2"] = $this->getMailingAddress2();
        $array["mailing_city"] = $this->getMailingCity();
        $array["mailing_district"] = $this->getMailingDistrict();
        $array["mailing_postal_code"] = $this->getMailingPostalCode();
        $array["mailing_country_code"] = $this->getMailingCountryCode();
        $array["fiscal_number"] = $this->getFiscalNumber();
        $array["legal"] = $this->getLegal();
        $array["bank_account"] = $this->getBankAccount();
        $array["kvk"] = $this->getKvk();
        $array["currency"] = $this->getCurrency();
        $array["pay_term"] = $this->getPayTerm();
        $array["comment"] = $this->getComment();
        $array["location"] = $this->getLocation();
        $array["amount_of_employees"] = $this->getAmountOfEmployees();
        $array["amount_of_accountmanagers"] = $this->getAmountOfAccountmanagers();
        $array["contact_person_id"] = $this->getContactPersonId();
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    private function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    private function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    private function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    private function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    private function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     */
    private function setWebsite($website)
    {
        $this->website = $website;
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
    private function setAddress($address)
    {
        $this->address = $address;
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
    private function setAddress2($address2)
    {
        $this->address2 = $address2;
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
    private function setCity($city)
    {
        $this->city = $city;
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
    private function setDistrict($district)
    {
        $this->district = $district;
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
    private function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @param mixed $country_code
     */
    private function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
    }

    /**
     * @return mixed
     */
    public function getMailingAddress()
    {
        return $this->mailing_address;
    }

    /**
     * @param mixed $mailing_address
     */
    private function setMailingAddress($mailing_address)
    {
        $this->mailing_address = $mailing_address;
    }

    /**
     * @return mixed
     */
    public function getMailingAddress2()
    {
        return $this->mailing_address2;
    }

    /**
     * @param mixed $mailing_address2
     */
    private function setMailingAddress2($mailing_address2)
    {
        $this->mailing_address2 = $mailing_address2;
    }

    /**
     * @return mixed
     */
    public function getMailingCity()
    {
        return $this->mailing_city;
    }

    /**
     * @param mixed $mailing_city
     */
    private function setMailingCity($mailing_city)
    {
        $this->mailing_city = $mailing_city;
    }

    /**
     * @return mixed
     */
    public function getMailingDistrict()
    {
        return $this->mailing_district;
    }

    /**
     * @param mixed $mailing_district
     */
    private function setMailingDistrict($mailing_district)
    {
        $this->mailing_district = $mailing_district;
    }

    /**
     * @return mixed
     */
    public function getMailingPostalCode()
    {
        return $this->mailing_postal_code;
    }

    /**
     * @param mixed $mailing_postal_code
     */
    private function setMailingPostalCode($mailing_postal_code)
    {
        $this->mailing_postal_code = $mailing_postal_code;
    }

    /**
     * @return mixed
     */
    public function getMailingCountryCode()
    {
        return $this->mailing_country_code;
    }

    /**
     * @param mixed $mailing_country_code
     */
    private function setMailingCountryCode($mailing_country_code)
    {
        $this->mailing_country_code = $mailing_country_code;
    }

    /**
     * @return mixed
     */
    public function getFiscalNumber()
    {
        return $this->fiscal_number;
    }

    /**
     * @param mixed $fiscal_number
     */
    private function setFiscalNumber($fiscal_number)
    {
        $this->fiscal_number = $fiscal_number;
    }

    /**
     * @return mixed
     */
    public function getVatNumber()
    {
        return $this->vat_number;
    }

    /**
     * @param mixed $vat_number
     */
    private function setVatNumber($vat_number)
    {
        $this->vat_number = $vat_number;
    }

    /**
     * @return mixed
     */
    public function getTaxNumber()
    {
        return $this->tax_number;
    }

    /**
     * @param mixed $tax_number
     */
    private function setTaxNumber($tax_number)
    {
        $this->tax_number = $tax_number;
    }

    /**
     * @return mixed
     */
    public function getLegal()
    {
        return $this->legal;
    }

    /**
     * @param mixed $legal
     */
    private function setLegal($legal)
    {
        $this->legal = $legal;
    }

    /**
     * @return mixed
     */
    public function getBankAccount()
    {
        return $this->back_account;
    }

    /**
     * @param mixed $back_account
     */
    private function setBankAccount($back_account)
    {
        $this->back_account = $back_account;
    }

    /**
     * @return mixed
     */
    public function getKvk()
    {
        return $this->kvk;
    }

    /**
     * @param mixed $kvk
     */
    private function setKvk($kvk)
    {
        $this->kvk = $kvk;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    private function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getPayTerm()
    {
        return $this->pay_term;
    }

    /**
     * @param mixed $pay_term
     */
    private function setPayTerm($pay_term)
    {
        $this->pay_term = $pay_term;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    private function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    private function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getBranchId()
    {
        return $this->branch_id;
    }

    /**
     * @param mixed $branch_id
     */
    private function setBranchId($branch_id)
    {
        $this->branch_id = $branch_id;
    }

    /**
     * @return mixed
     */
    public function getContactPersonId()
    {
        return $this->contact_person_id;
    }

    /**
     * @param mixed $contact_person_id
     */
    private function setContactPersonId($contact_person_id)
    {
        $this->contact_person_id = $contact_person_id;
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