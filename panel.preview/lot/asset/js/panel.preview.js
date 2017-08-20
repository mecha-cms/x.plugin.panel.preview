(function($, win, doc) {

    var $tab = $('#t\\:preview');

    if (!$tab) return;

    var $source = $tab.closest('form'),
        $destination = $('#panel-preview'),
        html = $destination.html();

    $tab.on("click.panel", function() {
        $destination.html(html);
        $.ajax({
            url: $(this).data('url'),
            type: 'POST',
            data: $source.serializeArray(),
            success: function(response, status, xhr) {
                $destination.html(response);
            },
            error: function(xhr, status, error) {
                $destination.html($language.error + '.');
            }
        });
        return false;
    });

})(window.PANEL, window, document);