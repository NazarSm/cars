<?php


namespace App\Api;

class BitrixApi
{
    public function send($data)
    {
        $queryUrl = sprintf(
            'https://%s.bitrix24.ua/rest/1/%s/crm.lead.add.json',
            env('API_BITRIX_PREFIX_DOMAINN'),
            env('API_BITRIX_KEY')
        );
        $queryData = http_build_query([
            'fields' => [
                'TITLE' => 'Название формы',
                'NAME' => $data["name"],
                'PHONE' => [
                    [
                        "VALUE" => $data["phoneNumber"],
                        "VALUE_TYPE" => "MOBILE"
                    ]
                ],
                'EMAIL' => [
                    [
                        "VALUE" => $data["email"],
                        "VALUE_TYPE" => "HOME"
                    ]
                ],
                'params' => ["REGISTER_SONET_EVENT" => "Y"]
            ]
        ]);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));
        $result = curl_exec($curl);
        curl_close($curl);
    }
}
