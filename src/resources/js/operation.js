$('#add_operation').on('change', function(e){

  //ファイルオブジェクトを取得する
  let files = e.target.files;
  $.each(files, function(index, file) {
    let reader = new FileReader();

    //アップロードした画像を設定する
    reader.onload = (function(file){
      return function(e){
        let imageLength = $('#output-box').children('li').length;
        // 表示されているプレビューの数を数える
        let labelLength = $("#image-input>label").eq(-1).data('label-id');
        // #image-inputの子要素labelの中から最後の要素のカスタムデータidを取得
        // プレビュー表示
        $('#image-input').before(`<li class="preview-image" id="upload-image${labelLength}" data-image-id="${labelLength}">
                                    <figure class="preview-image__figure">
                                      <img src='${e.target.result}' title='${file.name}' >
                                    </figure>
                                    <div class="preview-image__button">
                                      <a class="preview-image__button__edit">編集</a>
                                      <a class="preview-image__button__delete" data-image-id="${labelLength}">削除</a>
                                    </div>
                                  </li>`);
        $("#image-input>label").eq(-1).css('display','none');
        // 入力されたlabelを見えなくする
        if (imageLength < 9) {
          // 表示されているプレビューが９以下なら、新たにinputを生成する
          $("#image-input").append(`<label for="item_images${labelLength+1}" class="sell-container__content__upload__items__box__label" data-label-id="${labelLength+1}">
                                      <input multiple="multiple" class="sell-container__content__upload__items__box__input" id="item_images${labelLength+1}" style="display: none;" type="file" name="item[images][]">
                                      <i class="fas fa-camera fa-lg"></i>
                                    </label>`);
        };
      };
    })(file);
    reader.readAsDataURL(file);
  });
});


//削除ボタンが押された時
$(document).on('click', '.preview-image__button__delete', function(){
// イベント元のカスタムデータ属性の値を取得
let targetImageId = $(this).data('image-id');

$(`#upload-image${targetImageId}`).remove();
//プレビューを削除
$(`[for=item_images${targetImageId}]`).remove();
//削除したプレビューに関連したinputを削除

let imageLength = $('#output-box').children('li').length;
// 表示されているプレビューの数を数える

if (imageLength ==9) {
let labelLength = $("#image-input>label").eq(-1).data('label-id');
// 表示されているプレビューが９なら,#image-inputの子要素labelの中から最後の要素のカスタムデータidを取得
$("#image-input").append(`<label for="item_images${labelLength+1}" class="sell-container__content__upload__items__box__label" data-label-id="${labelLength+1}">
                            <input multiple="multiple" class="sell-container__content__upload__items__box__input" id="item_images${labelLength+1}" style="display: none;" type="file" name="item[images][]">
                            <i class="fas fa-camera fa-lg"></i>
                          </label>`);
};
});








// editアクションのJS
// 画像保存データがある場合の処理（商品編集画面で新規登録と同じ使用感での画像表示する処理）
// imgオブジェクトの個数をimageLengthに指定
let imageLength = $(".editimage").find("img").length;

// 以下で全ての既存画像に保存順にlabelLengthに名前をつけながらプレビュー表示する（.eachだと一括表示されているものは同じ番号としてlabelLengthに変化をつけられないのでfor文を使用）
for (let i = 0; i < $(".editimage").find("img").length; i++) {
let labelLength = gon.imageids[i];
console.log(labelLength)
// 表示用のクラスの子要素のimgオブジェクトの中のsrcを取得(.attr('img')だとsrcとカスタムデータの２属性をもつオブジェクトになってしまい取得後の再表示が上手くいかない)
let img = $('#img-'+ gon.imageids[i]).children('img').attr('src');
console.log(img)
// プレビュー表示（最初に定義した変数imgでsrcを再表示させます）
$('#image-input').before(`<li class="preview-image" id="upload-image${labelLength}" data-image-id="${labelLength}">
                          <figure class="preview-image__figure">
                          <img src='${img}' >
                          </figure>
                          <div class="preview-image__button">
                            <a class="preview-image__button__edit" href="">編集</a>
                            <a class="preview-image__button__delete" data-image-id="${labelLength}">削除</a>
                          </div>
                        </li>`);
                        $("#image-input>label").eq(-1).css('display','none');
            
if (imageLength < 10) {
// 表示されているプレビューが９以下なら、新たにinputを生成する
$("#image-input").append(`<label for="item_images${labelLength+1}" class="sell-container__content__upload__items__box__label" data-label-id="${labelLength+1}">
                            <input multiple="multiple" class="sell-container__content__upload__items__box__input" id="item_images${labelLength+1}" style="display: none;" type="file" name="item[images][]">
                            <i class="fas fa-camera fa-lg"></i>
                          </label>`);
};
};


//画像の削除ボタンが押された時
$(document).on('click', '.preview-image__button__delete', function(){

// イベント元のカスタムデータ属性の値を取得
let targetImageId = $(this).data('image-id');
console.log(targetImageId)
//削除ボタンを押された画像idをvalue（投げ入れる値）でhtmlにhidden状態で保存
let delete_input = `<input type="hidden" value="${targetImageId}" name="item[delete_image_ids][]">`
$(".sell-container__content__upload__items__box").append(delete_input);
});  