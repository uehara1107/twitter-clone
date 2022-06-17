# twitter-clone

### Hajimari内定者インターン用
Twitterクローンを作ってます。

## 開発環境
フレームワーク：Laravel (8.83.16)
言語：PHP (8.1.7)
データベース：MySQL (8.0.29)

## ブランチ
#### main
完全な状態

#### dev
テスト用。エラーはなく動いてる状態

#### feature
各機能ごとのブランチ。
命名はアッパーキャメルケースを採用
```
例：ログイン機能
feature/Login
```

#### fix
エラー修正のためのブランチ。
命名はキャメルケースを採用
```
例：ログイン画面のレイアウト修正
fix/loginLayout
```

## 命名規則
Hajimariの命名規則を採用。
以下の通り。

-----------------------
### 原則、クラス・メソッド・変数はキャメルケースで記述すること。
* ローマ字の使用を避け、英単語を使用すること。
* クラス名はアッパーキャメルケース（頭文字が大文字）で記述すること。
* 変数・メソッド名はローワーキャメルケース（頭文字が小文字）で記述すること。

Bad Case
```
/*
 * これはスネークケース。
 * Twitter Cloneでは避けるように（他の案件では採用される場合もある）。
 */
public function follow_user()
{
    //処理
}
```

Good Case
```
//こっちのキャメルケース推奨！
public function followUser()
{
    //処理
}
```

#### 名前を読んで内容が分かるようにすること。
* クラスやメソッドがどんな機能なのかが一目で分かる命名を心がける。
* 変数名を読んで、何が格納されているのかが一目で分かる命名を心がける。

Bad Case
```
//dataって何の？
$data = $user->id;
```
Good Case
```
//この変数にはユーザーのIDが入ってる！
$userId = $user->id;
命名は、基本的に英語の文法に則って記述すること。
```

Bad Case
```
//日本語の文法（目的語→動詞）
public function userDataGet()
{
    //処理
}

//get と edit と動詞が連続している。
public function getEditTweet()
{
    //処理
}
```
Good Case
```
//英語の文法（動詞→目的語）
public function getUserData()
{
    //処理
}

/*
 * 動詞 edit を Editing にして名詞化する。
 * または他の命名が出来ないか再考してみる。
 */
public function getEdittingTweet()
{
    //処理
}
```

#### その他、他の人が読みやすい命名を心がけること。

### PHP のコーディングは、原則以下の記事を参考にする
[PSR-2 コーディングガイド（日本語）](https://www.infiniteloop.co.jp/docs/psr/psr-2-coding-style-guide.php)


## コーディングスタイル
Hajimariのコーディングスタイルを採用。
以下の通り。

-----------------------

#### マジックナンバーは避け、定数として設定する（Consts ファイルを作成して呼び出しても良い）。また、定数の場合は全て大文字で命名しても良い。

Bad Case

```
php
if($follower == 0){
  echo 'フォロワーはいません。';
}
```

Good Case

```
php
public const NONE = 0;

if($follower == NONE){
  echo 'フォロワーはいません。';
}
```

#### バリデーションは Form Request を使用すること。

バリデーションはForm Requestを使用して行いましょう。

Form Requestを使用すると、Controllerに行く前にバリデーションを実施できます。

Bad Case
```
php
public function store(Request $request, Tweet $tweet)
{
    $data = $request->all();
    $validator = Validator::make($data, [
        'text' => ['required', 'string', 'max:140']
    ]);
    $validator->validate();
}
```

Good Case
```
php
public function authorize()
{
    return true;
}

public function rules()
{
    return [
        'text' => ['required', 'string', 'max:140'],
    ];
}
```

Form Requestに関しては、以下の記事を参考にしてください。

→ [FormRequestによるバリデーション](https://qiita.com/gone0021/items/249e99338ff414fc5737)

## 以下Fork元README
<p align="center">
    <img src="https://user-images.githubusercontent.com/35098175/145682384-0f531ede-96e0-44c3-a35e-32494bd9af42.png" alt="docker-laravel">
</p>
<p align="center">
    <img src="https://github.com/ucan-lab/docker-laravel/actions/workflows/laravel-create-project.yml/badge.svg" alt="Test laravel-create-project.yml">
    <img src="https://github.com/ucan-lab/docker-laravel/actions/workflows/laravel-git-clone.yml/badge.svg" alt="Test laravel-git-clone.yml">
    <img src="https://img.shields.io/github/license/ucan-lab/docker-laravel" alt="License">
</p>

## Introduction

Build a simple laravel development environment with docker-compose. Compatible with Windows(WSL2), macOS(M1) and Linux.

## Usage

1. Click [Use this template](https://github.com/ucan-lab/docker-laravel/generate)
2. Git clone & change directory
3. Execute the following command

```bash
$ make create-project # Install the latest Laravel project
$ make install-recommend-packages # Optional
```

http://localhost

## Tips

- Read this [Makefile](https://github.com/ucan-lab/docker-laravel/blob/main/Makefile).
- Read this [Wiki](https://github.com/ucan-lab/docker-laravel/wiki).

## Container structures

```bash
├── app
├── web
└── db
```

### app container

- Base image
  - [php](https://hub.docker.com/_/php):8.1-fpm-bullseye
  - [composer](https://hub.docker.com/_/composer):2.2

### web container

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.22

### db container

- Base image
  - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0

### mailhog container

- Base image
  - [mailhog/mailhog](https://hub.docker.com/r/mailhog/mailhog)
