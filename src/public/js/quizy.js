"use strict";

function buttonClick(question_number, clicked_choice_id, true_choice_id) {
    document.getElementById(clicked_choice_id).classList.add("failed");
    //全ての選択肢のクリック無効化
    const myElement = document.getElementById(`ul-${question_number}`);
    for (let i = 0; i < myElement.children.length; i++) {
        const choiceId = myElement.children[i].id;
        document.getElementById(choiceId).style.pointerEvents = "none";
    }
    //正誤判定
    if (clicked_choice_id == true_choice_id) {
        const true_choice = document.getElementById(true_choice_id);
        true_choice.classList.remove("failed"); //先ほどの「クリックした際に全て赤に変更」を取り除く
        true_choice.classList.add("succeeded");
        document.getElementById(`ans-t-${question_number}`).style.display =
            "block";
    } else {
        document.getElementById(`ans-f-${question_number}`).style.display =
            "block";
    }
}
