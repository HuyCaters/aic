<?php

namespace WPTheme\Admin;

/**
 * 都道府県リスト
 */
enum Prefecture: string
{
    // -----------------------
    // [Key] 都道府県名
    // -----------------------

    case Hokkaido = '北海道';
    case Aomori = '青森県';
    case Iwate = '岩手県';
    case Miyagi = '宮城県';
    case Akita = '秋田県';
    case Yamagata = '山形県';
    case Fukushima = '福島県';
    case Ibaraki = '茨城県';
    case Tochigi = '栃木県';
    case Gunma = '群馬県';
    case Saitama = '埼玉県';
    case Chiba = '千葉県';
    case Tokyo = '東京都';
    case Kanagawa = '神奈川県';
    case Niigata = '新潟県';
    case Toyama = '富山県';
    case Ishikawa = '石川県';
    case Fukui = '福井県';
    case Yamanashi = '山梨県';
    case Nagano = '長野県';
    case Gifu = '岐阜県';
    case Shizuoka = '静岡県';
    case Aichi = '愛知県';
    case Mie = '三重県';
    case Shiga = '滋賀県';
    case Kyoto = '京都府';
    case Osaka = '大阪府';
    case Hyogo = '兵庫県';
    case Nara = '奈良県';
    case Wakayama = '和歌山県';
    case Tottori = '鳥取県';
    case Shimane = '島根県';
    case Okayama = '岡山県';
    case Hiroshima = '広島県';
    case Yamaguchi = '山口県';
    case Tokushima = '徳島県';
    case Kagawa = '香川県';
    case Ehime = '愛媛県';
    case Kochi = '高知県';
    case Fukuoka = '福岡県';
    case Saga = '佐賀県';
    case Nagasaki = '長崎県';
    case Kumamoto = '熊本県';
    case Oita = '大分県';
    case Miyazaki = '宮崎県';
    case Kagoshima = '鹿児島県';
    case Okinawa = '沖縄県';

    // -----------------------
    // [Label] valueをそのままラベルとして使用
    // -----------------------

    /**
     * キーに対応した都道府県名を返す
     *
     * @return string 都道府県名
     */
    public function getLabel(): string
    {
        // valueがすでに都道府県名なのでそのまま返す
        return $this->value;
    }

    /**
     * キーとラベルのリストを返す
     *
     * @return array<string, string> キーとラベルの連想配列
     */
    public static function getList(): array
    {
        $list = [];
        foreach (self::cases() as $case) {
            $list[$case->value] = $case->getLabel();
        }

        return $list;
    }

    /**
     * option用のリストを返す
     *
     * @return array<array> キーとラベルの連想配列
     */
    public static function getOptionList(): array
    {
        $list = [];
        foreach (self::cases() as $case) {
            $list[] = [
                'label' => $case->getLabel(),
                'value' => $case->value,
            ];
        }

        return $list;
    }
}
