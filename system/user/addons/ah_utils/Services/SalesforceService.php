<?php

namespace Avenu\AhUtils\Services;

class SalesforceService
{
    public function processForm()
    {
        if(ee()->input->server('REQUEST_METHOD') === 'POST') {

            //save initial request
            $model = ee('Model')->make('ah_utils:LandingRegistration');
            print_r($_POST);
            exit;
            $model->set($_POST);
            $model->save();


            //send to salesforce

            //update record
            echo 'fdsa';
            exit;
        }
    }

    /**
     * @param string $url
     * @return string
     */
    public function urlGetContents(string $url): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /**
     * @return string
     */
    public function siteURL(): string
    {
        return ee()->config->item('site_url');
    }

    /**
     * @param string $phoneNumber
     * @return string
     */
    public function formatPhoneNumber(string $phoneNumber): string
    {
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        if (strlen($phoneNumber) > 10) {
            $countryCode = substr($phoneNumber, 0, strlen($phoneNumber) - 10);
            $areaCode = substr($phoneNumber, -10, 3);
            $nextThree = substr($phoneNumber, -7, 3);
            $lastFour = substr($phoneNumber, -4, 4);

            $phoneNumber = '+' . $countryCode . ' (' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
        } elseif (strlen($phoneNumber) == 10) {
            $areaCode = substr($phoneNumber, 0, 3);
            $nextThree = substr($phoneNumber, 3, 3);
            $lastFour = substr($phoneNumber, 6, 4);

            $phoneNumber = '(' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
        } elseif (strlen($phoneNumber) == 7) {
            $nextThree = substr($phoneNumber, 0, 3);
            $lastFour = substr($phoneNumber, 3, 4);

            $phoneNumber = $nextThree . '-' . $lastFour;
        }

        return $phoneNumber;
    }

    /**
     * @param string $html
     * @return string
     */
    public function prepareFormHtml(string $html): string
    {
        $aPlaceholders = [
            '<input type="hidden" name="tactic" value = "">' => '',
            '<input type="Text" name="mailingState" id="mailingState" placeholder="State" required>' => "{state-select}",
            '<input type="Text" name="birthDate" id="birthDate" placeholder="Birthdate" required>' => '<input type="date" name="birthDate" id="birthDate" min="1920-01-01" max="2020-01-01" required>',
            '<input type="submit" value="Submit" name="submit_form">' => '<div class="ah-submit"><input type="submit" value="Submit" name="submit_form" id="submit_form" class="g-recaptcha" data-sitekey="6LcllVwpAAAAAKsPv39ta3hJw7DghP9oO4OpEhQ8" data-callback="onSubmit" data-action="submit"></div>',
        ];

        $allowed = ['input', 'label'];
        $form = strip_tags($html, $allowed);
        foreach ($aPlaceholders as $k => $v) {
            $form = str_replace($k, $v, $form);
        }

        return $form;
    }
}