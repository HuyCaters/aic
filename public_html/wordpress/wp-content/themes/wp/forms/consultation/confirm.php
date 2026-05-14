<?php get_header(null, ['__css__' => [get_template_part('includes/front/recaptcha_setting')]]); ?>

<?php
$slug = $_SESSION['slug'];
$data = $_SESSION[$slug . '_data'];
?>

<div class="container p-4">

    <h2>確認情報</h2>
    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <th scope="row">会社名</th>
                <td><?= esc_html($data['company'] ?? '') ?></td>
            </tr>
            <tr>
                <th scope="row">所在地</th>
                <td>
                    〒 <?= esc_html($data['postcode'] ?? '') ?> <br>
                    <?= esc_html($data['prefecture'] ?? '') ?><?= esc_html($data['location'] ?? '') ?><?= esc_html($data['location_detail'] ?? '') ?>
                </td>
            </tr>
            <tr>
                <th scope="row">相談者名</th>
                <td><?= esc_html($data['name'] ?? '') ?></td>
            </tr>
            <tr>
                <th scope="row">電話番号</th>
                <td><?= esc_html($data['phone'] ?? '') ?></td>
            </tr>
            <tr>
                <th scope="row">メールアドレス</th>
                <td><?= esc_html($data['email'] ?? '') ?></td>
            </tr>
            <tr>
                <th scope="row">第１希望日</th>
                <td><?= esc_html($data['first_preference_date'] ?? '') ?>　<?= esc_html($data['first_preference_time'] ?? '') ?></td>
            </tr>
            <?php if (!empty($data['second_preference_date'])): ?>
                <tr>
                    <th scope="row">第２希望日</th>
                    <td><?= esc_html($data['second_preference_date'] ?? '') ?>　<?= esc_html($data['second_preference_time'] ?? '') ?></td>
                </tr>
            <?php endif; ?>
            <?php if (!empty($data['third_preference_date'])): ?>
                <tr>
                    <th scope="row">第３希望日</th>
                    <td><?= esc_html($data['third_preference_date'] ?? '') ?>　<?= esc_html($data['third_preference_time'] ?? '') ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <th scope="row">希望の相談手段</th>
                <td><?= esc_html($data['consultation_method'] ?? '') ?></td>
            </tr>
            <tr>
                <th scope="row">相談内容</th>
                <td><?= nl2br(esc_html($data['consultation_content'] ?? '')) ?></td>
            </tr>
            <tr>
                <th scope="row">プライバシーポリシー</th>
                <td>同意する</td>
            </tr>
        </tbody>
    </table>
    <form method="POST">
        <input type="hidden" name="<?= esc_attr($slug) ?>_confirm_submit" value="1">
        <a href="/<?= esc_attr($slug) ?>/" class="btn">← 前ページへ</a>
        <span class="confirm_submit btn btn-primary">送信</span>
    </form>
</div>

<?php get_footer(null, [
    '__script__' => [
        str_format(
            '<script src="{0}"></script>',
            get_stylesheet_directory_uri() . '/includes/front/assets/js/jquery-3.7.1.min.js'
        ),
        ('<script>
            $(function() {
                var isSubmit = false;
                $(".confirm_submit").on("click", function(e) {
                    e.preventDefault();
                    if (!isSubmit) {
                        isSubmit = true;
                        $("form").submit();
                    }
                });
            });
        </script>'),
    ]
]); ?>