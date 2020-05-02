# construction_management_system の説明

## 機能

- 当初契約、変更契約内容保存（スクレイピングと手打ちを選択可能）
- 当初数量、変更数量保存
- 発注者用数量計算書表示機能（変更ごとに行を追加）
- 受注者用数量計算書表示機能（出来高数量を並べて表示）
- 他画面の記入欄を自動判定して、登録データを記入する機能
- 内容検索機能（インクリメンタルサーチ）
- 音声で検索を可能とする
- 変更理由保存と数量へのリンク機能


## DB設計


### ER図
![ER図](https://user-images.githubusercontent.com/58900062/80857141-a469e400-8c8a-11ea-9623-89e5dcfb4917.png)

### userテーブル

|Column|Type|Options|
|------|----|-------|
|nick_name|string|null: false|
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
|record_timing_id|string|foreign_key: true|

- belongs_to :record_timing
- has_one :operation_amount


### operation_amountテーブル

|Column|Type|Options|
|------|----|-------|
|first_amount_name|string||
|first_amount|integer||
|second_amount_name|string||
|second_amount|integer||
|third_amount_name|string||
|third_amount|integer||
|forth_amount_name|string||
|forth_amount|integer||
|memo|text||
|operation_id|integer|foreign_key: true|

- belongs_to :operation_amount
- has_one :reason


### reasonテーブル

|Column|Type|Options|
|------|----|-------|
|reason_title|string||
|reason_text|text||
|operation_amount_id|integer|foreign_key: true|

- belongs_to :operation_amount