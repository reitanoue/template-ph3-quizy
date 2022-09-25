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
        document.getElementById(`ans-t-${question_number}`).style.display="block";
    }else{
        document.getElementById(`ans-f-${question_number}`).style.display="block";
    }
}

// //本体
// for(let i = 0; i < 10; i++) {

//     var onclickFunction = (question_number,clicked_number) => {

//         //クリックした際に全て赤に変更
//         let clicked_option = document.getElementById(question_number+"-"+clicked_number)
//         clicked_option.classList.add("failed");

//         //正解のボックスが青になるようにする（中身で判断）
//         for ( let p = 0; p < 3; p++ ){
//             if(quizSet[question_number][p] == true_answers[question_number]){
//                 let true_choice = document.getElementById(question_number+"-"+p);
//                 true_choice.classList.add("succeeded");
//                 true_choice.classList.remove("failed");//先ほどの「クリックした際に全て赤に変更」を取り除く
//             }
//         }

//         //全ての選択肢のクリック無効
//         let choice = document.getElementById(question_number+"-0");
//         choice2.style.pointerEvents="none";

//             //正解を選択したときの解説ブロックを表示
//             if (quizSet[question_number][clicked_number] == true_answers[question_number]){
//                 document.getElementById('ans-t-'+question_number).style.display="block";
//                 document.getElementById('ul-'+question_number).scrollIntoView({behavior:'smooth',block:'start'});
//             //不正解を選択したときの解説ブロックを表示
//             }else{
//                 document.getElementById('ans-f-'+question_number).style.display="block";
//                 document.getElementById('ul-'+question_number).scrollIntoView({behavior:'smooth',block:'start'});
//             }

// }
// };
