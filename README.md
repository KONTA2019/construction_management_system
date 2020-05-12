# Construction_management_system の説明

## 機能

- 当初数量、変更数量保存（スクレイピングと手打ちを併用可能）
- 受発注者用数量計算書を所定の形式によりエクセル表示
- 他画面の記入欄を自動判定して、登録データを記入する機能（主に積算システムで使用）
- 音声検索
- LINE検索


## DEMO
（実装中）


## 制作背景(意図)
- 数量計算書は何度も同じ項目を書き直す書類です。そこで、一度の登録で済ませることができるようにすることで作成者の負担を減らすことができます。
- ヒューマンエラーによる数量計算書内での矛盾を、同じ項目は一度しか入力しないようにすることでなくなるようにしました。
- エクセルによるデータ保存は３万項目（セル）程度で動作に不具合を起こしますが、AWSとmysqlを使用することで3000万項目でも３億項目でも上限なしで登録できるようになります。
- 出力でExcelを使用することで保存と書類化の機能を分けることで誤って大元のデータを削除することがなくなります。
- 現在のデータの管理はlocalのサーバへの保存のため、他事務所のデータを確認できません。加えて容量が80人で8TBという、CADや写真を保存するとあっという間に上限となってしまう容量のサーバであるため、サーバー追加が頻繁にあり、どこに最新のデータを保存したかわからなくなることがよくありました。この２つの問題点もAWSへの一括保存により解決することができます。
- リモートで作業が可能になります。
- これまでは現場での数量確認は書類との付き合わせで行なっていましたが、担当工事が多くなるとどこに必要書類が入っていたか忘れやすくなります。そこで書類で持っていかず、スマートフォンによる検索を可能とする機能を実装しました。


## 工夫したポイント
- 出力するシートを現在も使われている書式に揃えました。
- 記入部分(create)に関してはあえてjavascriptを使用しないことで、誤って戻るを押した場合もsessionでデータを残すことができるようにしました。


## 本番環境(デプロイ先、テストアカウント＆ID)
（実装中）


## 使用技術(開発環境)
- ECSとcircleCIによる自動デプロイ、自動補修機能、自動保存容量拡大機能（予定）
- LINEと連携（APIを利用）
- スクレイピング
- Laravel-Excel 3.1 の使用
- mysql
- ユーザー認証
- javascriptによる動的な削除プレビュー（削除の取止めを可能とするため）
- cssによるフロント実装（bootstrapを使用しない方法）


## 課題や今後実装したい機能
- このアプリのデータベースについては本来さらに正規化ができますが、逆に使いにくくなりそうだったためやめました。そのため、UXを損なわない正規化があれば取り入れたいです。
- ユーザー認証のところでマスターユーザ登録により、決裁権を持つ人のみ全資料編集可とする機能を実装したいです。
- 誰によって編集されたかの足跡機能も実装したいです
- ぱんくず機能
- UI/UXの追求（ページネーションなど）
- 警告文を出すか出さないか設定できる機能


## DB設計


### ER図
![v4.png](https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/555157/90789d7a-c937-b450-b4f6-1541f2939860.png)


### userテーブル

|Column|Type|Options|
|------|----|-------|
|nick_name|string|null: false,unique: true|
|first_name|string|null: false|
|last_name|string|null: false|
|organizationname|string|null: false|
|password|string|null: false|
|password_confirmation|string|null: false|

- has_many :projects


### projectテーブル

|Column|Type|Options|
|------|----|-------|
|projectname|string|null: false|
|budget_division|string|null: false|
|city|string|null: false|
|district|string|null: false|
|prefperson_in_charge|string|null: false|
|vendorperson_in_charge|string|null: false|
|user_id|integer|null: false, foreign_key: true|

- belongs_to :user
- has_many :record_timings


### record_timingテーブル

|Column|Type|Options|
|------|----|-------|
|specific|string|null: false|
|span|string|null: false|
|period|string|null: false|
|project_id|integer|null: false, foreign_key: true|

- belongs_to :project
- has_many :operations


### operationテーブル

|Column|Type|Options|
|------|----|-------|
|first_operation_class|string||
|secondoperation_class|string||
|third_operation_class|string||
|forth_operation_class|string||
|fifth_operation_class|string||
|sixth_operation_class|string||
|kanni_keisan|string||
|syousai_keisan|string||
|first_amount_name|string||
|first_amount|integer||
|second_amount_name|string||
|second_amount|integer||
|third_amount_name|string||
|third_amount|integer||
|forth_amount_name|string||
|forth_amount|integer||
|memo|text||
|reason_title|string||
|reason_text|text||
|record_timing_id|string|foreign_key: true|

- belongs_to :record_timing

