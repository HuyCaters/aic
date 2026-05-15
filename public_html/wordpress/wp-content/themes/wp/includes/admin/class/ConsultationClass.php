<?php

class ConsultationClass extends FormClass
{
    public $dataForm = [
        'company'               => '会社名',
        'postcode'              => '郵便番号',
        'prefecture'            => '都道府県',
        'location'              => '市区町村名・番地',
        'location_detail'       => '建物名・部屋番号',
        'name'                  => '相談者名',
        'phone'                 => '電話番号',
        'email'                 => 'メールアドレス',
        'first_preference_date' => '第１希望日',
        'first_preference_time' => '第１希望時間',
        'second_preference_date' => '第２希望日',
        'second_preference_time' => '第２希望時間',
        'third_preference_date' => '第３希望日',
        'third_preference_time' => '第３希望時間',
        'hope_2_date'           => '２開所日希望',
        'acknowledgement'       => '了承事項',
        'consultation_method'   => '相談手段',
        'consultation_content'  => '相談内容',
        'email_checked'         => 'メールアドレス確認',
        'required_checked'      => '必須項目確認',
        'privacy_policy'        => 'プライバシーポリシー',
    ];


    public $dataFormValidate = [
        'company' => [
            ['rule' => 'notEmpty', 'message' => '会社名を入力してください。'],
            ['rule' => 'maxLength', 'message' => '100文字以内でご入力してください。', 'value' => 100],
        ],
        'postcode' => [
            ['rule' => 'notEmpty', 'message' => '郵便番号を入力してください。'],
            ['rule' => 'postcode', 'message' => '正しい郵便番号を入力してください。'],
        ],
        'prefecture' => [
            ['rule' => 'notEmpty', 'message' => '都道府県を選択してください。'],
        ],
        'location' => [
            ['rule' => 'notEmpty', 'message' => '市区町村名・番地を入力してください。'],
            ['rule' => 'maxLength', 'message' => '100文字以内でご入力してください。', 'value' => 100],
        ],
        'location_detail' => [
            ['rule' => 'maxLength', 'message' => '100文字以内でご入力してください。', 'value' => 100],
        ],
        'name' => [
            ['rule' => 'notEmpty', 'message' => '相談者名を入力してください。'],
            ['rule' => 'maxLength', 'message' => '100文字以内でご入力してください。', 'value' => 100],
        ],
        'phone' => [
            ['rule' => 'notEmpty', 'message' => '電話番号を入力してください。'],
            ['rule' => 'phone', 'message' => '正しい電話番号を入力してください。'],
        ],
        'email' => [
            ['rule' => 'notEmpty', 'message' => 'メールアドレスを入力してください。'],
            ['rule' => 'maxLength', 'message' => '100文字以内でご入力してください。', 'value' => 100],
            ['rule' => 'email', 'message' => '正しいメールアドレスを入力してください。'],
        ],
        'first_preference_date' => [
            ['rule' => 'notEmpty', 'message' => '希望日を入力してください。'],
            ['rule' => 'date', 'message' => '正しい日付を入力してください。'],
        ],
        'first_preference_time' => [
            ['rule' => 'notEmpty', 'message' => '希望時間を入力してください。'],
            ['rule' => 'time', 'message' => '正しい時間を入力してください。'],
        ],
        'hope_2_date' => [
            ['rule' => 'notEmpty', 'message' => 'チェックを入れてください。'],
        ],
        'acknowledgement' => [
            ['rule' => 'notEmpty', 'message' => 'チェックを入れてください。'],
        ],
        'consultation_method' => [
            ['rule' => 'notEmpty', 'message' => '相談手段を選択してください。'],
            ['rule' => 'inArray', 'message' => '相談手段を選択してください。', 'value' => ['AIセンターへの来訪', 'AIセンタータッフによる訪問', 'Web会議', '電話']],
        ],
        'consultation_content' => [
            ['rule' => 'notEmpty', 'message' => '内容を入力してください。'],
            ['rule' => 'maxLength', 'message' => '3000文字以内でご入力してください。', 'value' => 3000],
        ],
        'email_checked' => [
            ['rule' => 'notEmpty', 'message' => 'チェックを入れてください。'],
        ],
        'required_checked' => [
            ['rule' => 'notEmpty', 'message' => 'チェックを入れてください。'],
        ],
        'privacy_policy' => [
            ['rule' => 'notEmpty', 'message' => 'チェックを入れてください。'],
        ]
    ];


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * クラスの初期化
     */

    public function init()
    {
        parent::init();
    }


    public function convertData($data)
    {
        $data['address'] = '〒 ' . ($data['postcode'] ?? '') . PHP_EOL . '　 ' . ($data['prefecture'] ?? '') . ($data['location'] ?? '') . ($data['location_detail'] ?? '');
        $data['preference'] = ($data['first_preference_date'] ?? '') . ' ' . ($data['first_preference_time'] ?? '');
        
        if (!empty($data['second_preference_date']) || !empty($data['third_preference_date'])) {
            $data['preference'] = '　第１希望日: ' . $data['preference'];
            if (!empty($data['second_preference_date'])) {
                $data['preference'] .= PHP_EOL . "　第２希望日: " . ($data['second_preference_date'] ?? '') . ' ' . ($data['second_preference_time'] ?? '');
            }
            if (!empty($data['third_preference_date'])) {
                $data['preference'] .= PHP_EOL . "　第３希望日: " . ($data['third_preference_date'] ?? '') . ' ' . ($data['third_preference_time'] ?? '');
            }
        }

        if(!empty($data['consultation_content'])){
            $data['consultation_content'] = preventGarbledCharacters($data['consultation_content']);
        }
        return $data;
    }
}
