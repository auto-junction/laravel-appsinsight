@if( config('appsinsight.tracking') && config('appsinsight.platform') )
<!-- Start of Apps-Insights Script -->
<script>
window.appsInsightsConfig = {
    platform: "{{ config('appsinsight.platform') }}",
    publicVapidKey: "{{ config('appsinsight.publicVapidKey') }}",
    page_type: 'Not Set'
};
(function (w,d,s,a) {
    w[a]=w[a]||[];
    var x = d.getElementsByTagName(s)[0];
    j=d.createElement(s),j.async = true;
    j.src = "https://ms2.tractorjunction.com/sdk.js?v={{ config('appsinsight.version') }}";
    x.parentNode.insertBefore(j, x);
    j.onload = function(){w[a].configInit(w.appsInsightsConfig);w[a].init();};
})(window,document,'script','appsInsights');
function insightsTag() { appsInsights.push( arguments )}
</script>
<!-- End of Apps-Insights Script -->
    @if( isset($insight_data) && is_array( $insight_data ) )
    <script>
        window.addEventListener('appsInsights_init', function () {
            insightsTag('page_data', JSON.parse(`{!! json_encode( $insight_data ) !!}`) );
        })
    </script>
    @endif
@endif