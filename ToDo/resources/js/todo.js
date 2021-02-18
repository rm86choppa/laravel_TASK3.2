const table = document.getElementById('table');
const tr_array = table.querySelectorAll('tr');
const done_array = table.querySelectorAll('#done');
const working_array = table.querySelectorAll('#working');

function filtering(e) {

    switch(this.type) {
        case "all" :

            //全ての行を表示
            tr_array.forEach(element => {
                if(element.style.display == 'none') {
                    element.style.display = "";
                }
            });

        break;

        case "working" :

            //完了の行を非表示
            done_array.forEach(element => {

                element.style.display = 'none';
                
            });

            //作業中の行を表示(直前に完了のラジオボタンが押されていた場合、作業中が非表示のため)
            working_array.forEach(element => {

                element.style.display = '';
                
            });

            break;

            case "done" :

            //作業中の行を非表示
            working_array.forEach(element => {

                element.style.display = 'none';
                
            });

            //完了の行を表示(直前に作業中のラジオボタンが押されていた場合、完了が非表示のため)
            done_array.forEach(element => {

                element.style.display = '';
                
            });

            break;
    }
}

//ラジオボタン全て取得
const radios = document.getElementsByName('select');

//ラジオボタンの要素をループでid取得しそれぞれにイベントリスナーを登録、クリック監視
radios.forEach(radio=>{
    const radio_type = radio.id;
    radio.addEventListener('click', {type:radio_type, handleEvent: filtering})
});
