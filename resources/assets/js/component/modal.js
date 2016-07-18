export function Modal() {
    'use strict';

    let element = {
        comment: $('#modal-comment')
    };

    return {
        showComment: showComment
    };

    /**
     * コメントモーダルを表示する
     */
    function showComment() {
        element.comment.modal('show');
    }
}