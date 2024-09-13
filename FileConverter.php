<?php

// Composerのオートローダーを読み込む
require 'vendor/autoload.php';

// 引数の確認
if ($argc !== 4 || $argv[1] !== 'markdown') {
    echo "使い方: php FileConverter.php markdown inputfile outputfile\n";
    exit(1);
}

$inputFile = $argv[2];
$outputFile = $argv[3];

// 入力ファイルの存在確認
if (!file_exists($inputFile)) {
    echo "入力ファイルが存在しません: $inputFile\n";
    exit(1);
}

// Markdownファイルの内容を読み込む
$markdownContent = file_get_contents($inputFile);

// Parsedownクラスのインスタンスを作成
$parsedown = new Parsedown();

// MarkdownをHTMLに変換
$htmlContent = $parsedown->text($markdownContent);

// 変換したHTMLを出力ファイルに書き込む
file_put_contents($outputFile, $htmlContent);

echo "MarkdownファイルがHTMLに変換されました: $outputFile\n";
