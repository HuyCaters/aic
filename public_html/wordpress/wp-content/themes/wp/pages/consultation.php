<?php

use WPTheme\Admin\Prefecture; ?>
<?php get_header(null, ['__css__' => [get_template_part('includes/front/recaptcha_setting')]]); ?>

<?php
$post = get_post();
$slug = $post->post_name;
// 固定
$errors     = $_SESSION[$slug . '_errors'] ?? [];
$data       = $_SESSION[$slug . '_data'] ?? [];
unset($_SESSION[$slug . '_errors']);
unset($_SESSION[$slug . '_data']);
// End：固定

?>
<div class="container p-4">
    <h2><?= esc_html($post->post_title) ?></h2>

    <form method="POST" enctype="multipart/form-data" class="h-adr">
        <input type="hidden" name="<?= esc_attr($slug) ?>_submit" value="1">
        <span class="p-country-name" style="display:none;">Japan</span>

        <div class="mb-3">
            <label for="company" class="form-label">会社名</label>
            <input
                type="text"
                name="company"
                class="form-control"
                id="company"
                placeholder="例）株式会社〇〇"
                value="<?= esc_attr($data['company'] ?? '') ?>"
                maxlength="100">
            <span class="error" style="color:red"><?= $errors['company'] ?? '' ?></span>
        </div>

        <div class="mb-3">
            <label for="postcode" class="form-label">所在地</label>

            <div>
                <div class="col-4 mb-3">
                    <input
                        type="text"
                        name="postcode"
                        class="form-control p-postal-code"
                        id="postcode"
                        placeholder="例）000-0000"
                        value="<?= esc_attr($data['postcode'] ?? '') ?>"
                        maxlength="8">
                    <span class="error" style="color:red"><?= $errors['postcode'] ?? '' ?></span>
                </div>
                <div class="col-4 mb-3">
                    <select name="prefecture" class="form-select p-region" id="prefecture">
                        <option value="">都道府県を選択してください</option>
                        <?php foreach (Prefecture::cases() as $prefecture) : ?>
                            <option value="<?= esc_attr($prefecture->value) ?>" <?= (isset($data['prefecture']) && $data['prefecture'] === $prefecture->value) ? 'selected' : '' ?>><?= esc_html($prefecture->value) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="error" style="color:red"><?= $errors['prefecture'] ?? '' ?></span>
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        name="location"
                        class="form-control p-locality p-street-address"
                        id="location"
                        placeholder="例）宇都宮市中央本町1-2-3"
                        value="<?= esc_attr($data['location'] ?? '') ?>"
                        maxlength="100">
                    <span class="error" style="color:red"><?= $errors['location'] ?? '' ?></span>
                </div>
                <input
                    type="text"
                    name="location_detail"
                    class="form-control p-extended-address"
                    id="location_detail"
                    placeholder="例）ABCマンション101号室"
                    value="<?= esc_attr($data['location_detail'] ?? '') ?>"
                    maxlength="100">
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">相談者名</label>
            <input
                type="text"
                name="name"
                class="form-control"
                id="name"
                placeholder="山田 太郎" value="<?= esc_attr($data['name'] ?? '') ?>"
                maxlength="100">
            <span class="error" style="color:red"><?= $errors['name'] ?? '' ?></span>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">電話番号</label>
            <input
                type="text"
                name="phone"
                class="form-control"
                id="phone"
                placeholder="例）00000000000"
                value="<?= esc_attr($data['phone'] ?? '') ?>"
                maxlength="13">
            <span class="error" style="color:red"><?= $errors['phone'] ?? '' ?></span>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input
                type="text"
                name="email"
                class="form-control"
                id="email"
                placeholder="例）username@example.com"
                value="<?= esc_attr($data['email'] ?? '') ?>"
                maxlength="100">
            <span class="error" style="color:red"><?= $errors['email'] ?? '' ?></span>
        </div>

        <div class="mb-3">
            <label for="first_preference_date" class="form-label">第１希望日</label>
            <div class="row">
                <div class="col-6">
                    <input
                        type="date"
                        name="first_preference_date"
                        class="form-control"
                        id="first_preference_date"
                        value="<?= esc_attr($data['first_preference_date'] ?? '') ?>">
                    <span class="error" style="color:red"><?= $errors['first_preference_date'] ?? '' ?></span>
                </div>
                <div class="col-6">
                    <input type="time" name="first_preference_time" class="form-control" id="first_preference_time" value="<?= esc_attr($data['first_preference_time'] ?? '') ?>">
                    <span class="error" style="color:red"><?= $errors['first_preference_time'] ?? '' ?></span>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="second_preference_date" class="form-label">第２希望日</label>
            <div class="row">
                <div class="col-6">
                    <input
                        type="date"
                        name="second_preference_date"
                        class="form-control"
                        id="second_preference_date"
                        value="<?= esc_attr($data['second_preference_date'] ?? '') ?>">
                </div>
                <div class="col-6">
                    <input type="time" name="second_preference_time" class="form-control" id="second_preference_time" value="<?= esc_attr($data['second_preference_time'] ?? '') ?>">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="third_preference_date" class="form-label">第３希望日</label>
            <div class="row">
                <div class="col-6">
                    <input
                        type="date"
                        name="third_preference_date"
                        class="form-control"
                        id="third_preference_date"
                        value="<?= esc_attr($data['third_preference_date'] ?? '') ?>">
                </div>
                <div class="col-6">
                    <input type="time" name="third_preference_time" class="form-control" id="third_preference_time" value="<?= esc_attr($data['third_preference_time'] ?? '') ?>">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">希望日は２開所日以降（申込日が6月5日（土）の場合6月8日（火）以降）をご指定下さい</label>
            <div class="form-check">
                <input hidden name="hope_2_date" value="">
                <input type="checkbox" name="hope_2_date" class="form-check-input" id="hope_2_date" value="２開所日以降を指定しました" <?= isset($data['hope_2_date']) && $data['hope_2_date'] === '２開所日以降を指定しました' ? 'checked' : '' ?>><label for="hope_2_date" class="form-check-label">２開所日以降を指定しました</label>
                <span class="error" style="color:red"><?= $errors['hope_2_date'] ?? '' ?></span>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">日程によっては、ご希望に沿えない場合がございます。予めご了承願います。</label>
            <div class="form-check">
                <input hidden name="acknowledgement" value="">
                <input type="checkbox" name="acknowledgement" class="form-check-input" id="acknowledgement" value="了承事項を確認しました" <?= isset($data['acknowledgement']) && $data['acknowledgement'] === '了承事項を確認しました' ? 'checked' : '' ?>><label for="acknowledgement" class="form-check-label">了承事項を確認しました</label>
                <span class="error" style="color:red"><?= $errors['acknowledgement'] ?? '' ?></span>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">希望の相談手段</label>
            <input hidden name="consultation_method" value="">
            <?php foreach (['AIセンターへの来訪', 'AIセンタータッフによる訪問', 'Web会議', '電話'] as $method): ?>
                <div class="form-check">
                    <input type="radio" name="consultation_method" class="form-check-input" id="<?= esc_attr($method) ?>" value="<?= esc_attr($method) ?>" <?= isset($data['consultation_method']) && $data['consultation_method'] === $method ? 'checked' : '' ?>>
                    <label for="<?= esc_attr($method) ?>" class="form-check-label"><?= esc_html($method) ?></label>
                </div>
            <?php endforeach; ?>
            <span class="error" style="color:red"><?= $errors['consultation_method'] ?? '' ?></span>
        </div>

        <div class="mb-3">
            <label for="consultation_content" class="form-label">相談内容:</label>
            <textarea
                name="consultation_content"
                id="consultation_content"
                class="form-control"
                placeholder="相談内容を入力してください"
                maxlength="3000"><?= esc_textarea($data['consultation_content'] ?? '') ?></textarea>
            <span class="error" style="color:red"><?= $errors['consultation_content'] ?? '' ?></span>
        </div>

        <div class="mb-3 col-6 mx-auto">
            <div class="form-check">
                <input hidden name="email_checked" value="">
                <input type="checkbox" name="email_checked" class="form-check-input" id="email_checked" value="メールアドレスを確認しました" <?= isset($data['email_checked']) && $data['email_checked'] === 'メールアドレスを確認しました' ? 'checked' : '' ?>><label for="email_checked" class="form-check-label">メールアドレスを確認しました</label>
                <span class="error" style="color:red"><?= $errors['email_checked'] ?? '' ?></span>
            </div>
            <div class="form-check">
                <input hidden name="required_checked" value="">
                <input type="checkbox" name="required_checked" class="form-check-input" id="required_checked" value="必須項目の入力と内容を確認しました" <?= isset($data['required_checked']) && $data['required_checked'] === '必須項目の入力と内容を確認しました' ? 'checked' : '' ?>><label for="required_checked" class="form-check-label">必須項目の入力と内容を確認しました</label>
                <span class="error" style="color:red"><?= $errors['required_checked'] ?? '' ?></span>
            </div>
            <div class="form-check">
                <input hidden name="privacy_policy" value="">
                <input type="checkbox" name="privacy_policy" class="form-check-input" id="privacy_policy" value="プライバシーポリシーに同意する" <?= isset($data['privacy_policy']) && $data['privacy_policy'] === 'プライバシーポリシーに同意する' ? 'checked' : '' ?>><a href="#">プライバシーポリシー</a><label for="privacy_policy" class="form-check-label">に同意する</label>
                <span class="error" style="color:red"><?= $errors['privacy_policy'] ?? '' ?></span>
            </div>
        </div>

        <span class="form_submit btn btn-primary" data-post-type="<?= esc_attr($slug) ?>">入力内容を確認する</span>
    </form>
</div>

<?php get_footer(null, [
    '__script__' => [
        str_format(
            '<script src="{0}"></script>',
            get_stylesheet_directory_uri() . '/includes/front/assets/js/jquery-3.7.1.min.js'
        ),
        str_format(
            '<script src="{0}"></script>',
            get_stylesheet_directory_uri() . '/includes/front/assets/js/form.js'
        ),
        str_format(
            '<script src="{0}"></script>',
            get_stylesheet_directory_uri() . '/includes/front/assets/js/yubinbango.js'
        )
    ]
]); ?>