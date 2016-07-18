export function Header() {
    "use strict";

    let elements = {
        btnComment: $('.btn-comment')
    };

    elements.btnComment.on('click', component.$modal.showComment);
}