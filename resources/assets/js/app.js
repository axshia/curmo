import $ from 'jquery';

window.jQuery = $;
window.$ = $;

//共通コンポーネントを格納する
window.component = {
    $modal: require('./component/modal').Modal()
};

require('bootstrap-sass');

//共通エレメント
require('./header').Header();