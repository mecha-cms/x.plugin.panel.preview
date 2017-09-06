(function($, win, doc) {

    var $tab = $('#t\\:preview');

    if (!$tab) return;

    var $source = $tab.closest('form'),
        $destination = $('#panel-preview'),
        html = $destination.html();

    $tab.on("click.panel", function() {
        var $this = $(this).focus(); // force “blur” event on any editor
        $destination.html(html);
        win.setTimeout(function() {
            $.ajax({
                url: $this.data('url'),
                type: 'POST',
                data: $source.serializeArray(),
                success: function(response, status, xhr) {
                    $destination.html(response);
                },
                error: function(xhr, status, error) {
                    $destination.html($language.error + '.');
                }
            });
        }, 1000);
        return false;
    }).siblings().on("click.panel", function() {
        $destination.html("");
    });

})(window.PANEL, window, document);