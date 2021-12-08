-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-12-08 10:08:31
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `make_music`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `major_chord`
--

CREATE TABLE `major_chord` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `chord` varchar(50) NOT NULL COMMENT 'コード'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `major_chord`
--

INSERT INTO `major_chord` (`id`, `chord`) VALUES
(1, 'C'),
(2, 'Cs'),
(3, 'D'),
(4, 'Ds'),
(5, 'E'),
(6, 'F'),
(7, 'Fs'),
(8, 'G'),
(9, 'Gs'),
(10, 'A'),
(11, 'As'),
(12, 'B'),
(13, 'C'),
(14, 'Cs'),
(15, 'D'),
(16, 'Ds'),
(17, 'E'),
(18, 'F'),
(19, 'Fs'),
(20, 'G'),
(21, 'Gs'),
(22, 'A'),
(23, 'As'),
(24, 'B');

-- --------------------------------------------------------

--
-- テーブルの構造 `minor_chord`
--

CREATE TABLE `minor_chord` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `chord` varchar(50) DEFAULT NULL COMMENT 'コード'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `minor_chord`
--

INSERT INTO `minor_chord` (`id`, `chord`) VALUES
(1, 'Cm'),
(2, 'Csm'),
(3, 'Dm'),
(4, 'Dsm'),
(5, 'Em'),
(6, 'Fm'),
(7, 'Fsm'),
(8, 'Gm'),
(9, 'Gsm'),
(10, 'Am'),
(11, 'Asm'),
(12, 'Bm'),
(13, 'Cm'),
(14, 'Csm'),
(15, 'Dm'),
(16, 'Dsm'),
(17, 'Em'),
(18, 'Fm'),
(19, 'Fsm'),
(20, 'Gm'),
(21, 'Gsm'),
(22, 'Am'),
(23, 'Asm'),
(24, 'Bm');

-- --------------------------------------------------------

--
-- テーブルの構造 `nice`
--

CREATE TABLE `nice` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flg` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `nice`
--

INSERT INTO `nice` (`id`, `post_id`, `user_id`, `flg`) VALUES
(26, 1, 39, 0),
(27, 39, 1, 0),
(28, 45, 1, 0),
(29, 37, 12, 0),
(30, 37, 14, 0),
(31, 47, 15, 0),
(32, 37, 1, 0),
(33, 37, 18, 0),
(34, 49, 20, 1),
(35, 50, 21, 1),
(36, 37, 22, 1),
(37, 39, 23, 1),
(38, 39, 12, 0),
(39, 39, 14, 0),
(40, 39, 24, 0),
(41, 39, 25, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザーID',
  `name` varchar(500) NOT NULL,
  `main_key` varchar(500) NOT NULL COMMENT '使用キー',
  `main_scale` varchar(500) NOT NULL COMMENT '使用スケール',
  `progress_chord` varchar(500) DEFAULT NULL,
  `in_chord` varchar(500) DEFAULT NULL COMMENT 'イントロ',
  `A_chord` varchar(500) DEFAULT NULL COMMENT 'Aメロ',
  `B_chord` varchar(500) DEFAULT NULL COMMENT 'Bメロ',
  `main_chord` varchar(500) DEFAULT NULL COMMENT 'サビ',
  `C_chord` varchar(500) DEFAULT NULL COMMENT 'Cメロ',
  `out_chord` varchar(500) DEFAULT NULL COMMENT 'アウトロ',
  `body` varchar(5000) NOT NULL COMMENT '感想',
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '登録日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `post`
--

INSERT INTO `post` (`id`, `user_id`, `name`, `main_key`, `main_scale`, `progress_chord`, `in_chord`, `A_chord`, `B_chord`, `main_chord`, `C_chord`, `out_chord`, `body`, `created_at`) VALUES
(39, 1, '管理人', 'C', 'メジャースケール', 'Am→G→C→F', 'Am→G→D→F', 'Am→Em7→F→G→C', 'Dm7→Am→A#→G#→E7', 'Am→Em7→F→G→C', 'F→G→G#dim→Am→Dm7→E7', 'Am→G→C→F', '定番のスケールです。同じスケールの使い方で「さよならエレジー」等が挙げられますが、非常に明るい響きです。一度曲を作ってみると楽しいので、ぜひとも一度お試しください！', '2021-12-01 12:35:16'),
(44, 13, 'はらちゃん', 'F#', 'マイナーペンタトニックスケール', 'A#m_Fm_Dm_G#m', '', '', '', '', '', '', '初めて作った曲で思い入れが強いです！！', '2021-12-02 18:01:21'),
(45, 14, 'リムル', 'G', 'ハーモニックスケール', 'D_Am_F_B#', 'D_Am_F_B#', 'D_Am_F_B#', '', 'D_Am_F_B#', 'D_Am_G#maim_F_B#', 'D_Am_F_B#', 'ハーモニックスケールならではの綺麗な音色がすきです。よかったら使ってみてください。', '2021-12-02 18:40:53'),
(46, 12, 'みやーじリンクス', 'F#m', 'マイナースケール', 'F#m_Am_B_C#', '', '', 'F#m_Am_B_C#', 'F#m_D#m_Am_B_C#', '', 'F#m_Am_B_C#', 'ガンダムのアニメを意識して作りました。寂しい雰囲気のコード進行になります、よかったら使ってみてください。', '2021-12-07 13:23:28'),
(51, 12, 'みやーじリンクス', 'D', 'メジャーペンタトニックスケール', 'Am→G→C→F', '', '', '', '', '', '', 'ペンタトニックスケールにセカンドドミナントコードを追加して、お洒落な雰囲気に仕上げました。', '2021-12-05 16:23:07'),
(55, 25, '奥田', 'D', 'メジャースケール', 'Am→G→C→F', 'Am→G→D→F', 'Am→Em7→F→G→C', 'Dm7→Am→A#→G#→E7', 'Am→Em7→F→G→C', 'F→G→G#dim→Am→Dm7→E7', 'Am→G→C→F', 'test編集済み', '2021-12-07 16:10:11');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(50) NOT NULL COMMENT 'ニックネーム',
  `email` varchar(50) NOT NULL COMMENT 'メールアドレス',
  `password` varchar(50) NOT NULL COMMENT 'パスワード',
  `history` varchar(50) NOT NULL COMMENT '音楽歴',
  `guiter` varchar(50) NOT NULL COMMENT '使用ギター',
  `artist1` varchar(50) NOT NULL COMMENT '好きなアーティスト1',
  `artist2` varchar(50) DEFAULT NULL COMMENT '好きなアーティスト2',
  `artist3` varchar(50) DEFAULT NULL COMMENT '好きなアーティスト3',
  `music1` varchar(50) NOT NULL COMMENT '好きな曲1',
  `music2` varchar(50) DEFAULT NULL COMMENT '好きな曲2',
  `music3` varchar(50) DEFAULT NULL COMMENT '好きな曲3',
  `role` int(11) NOT NULL DEFAULT 0 COMMENT '権限',
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '登録日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `history`, `guiter`, `artist1`, `artist2`, `artist3`, `music1`, `music2`, `music3`, `role`, `created_at`) VALUES
(1, '管理人', 'atsushi091111@yahoo.co.jp', 'aaaa1111', '12', 'Morris-S92Ⅲ', 'YOASOBI', 'ヨルシカ', '押尾コータロー', '群青', '春泥棒', '翼～YouAreTheHero～', 0, '2021-12-02 14:53:16'),
(12, 'みやーじリンクス', 'test@test.jp', 'test', '0', 'Miadi-Special', 'IKON', '', '', 'KillingMe', 'JERK', 'クライマックス', 0, '2021-12-02 17:45:06'),
(13, 'はらちゃん', 'hara@gmail.com', 'hara', '3', 'ギターFender、ベースESP,IBANES', 'UverWorld', 'NovelBright', 'MyFirstStory', 'クオリア', 'real?', 'reviver', 0, '2021-12-02 17:49:14'),
(14, 'リムル', 'rimuru@gmai.com', 'rimuru', '3', 'Tempest:101DC', 'ミリム', 'シュナ', 'ヴェルドラは嫌い', 'ドラゴノヴァ', 'ヒーリングライフ', 'とにかくヴェルドラは嫌い', 0, '2021-12-02 18:25:24'),
(23, 'test', 'atusdfghdsfhj@gmail.com', 'aaaa1111', '1', 'test-DC', 'IKON', 'ヨルシカ', '押尾コータロー', '群青', '春泥棒', 'クライマックス', 0, '2021-12-06 21:11:18'),
(25, '奥田', 'test@test.com', 'test', '3', 'test-DC', '', '', '', '', '', '', 0, '2021-12-07 16:08:47');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `major_chord`
--
ALTER TABLE `major_chord`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `minor_chord`
--
ALTER TABLE `minor_chord`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `nice`
--
ALTER TABLE `nice`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `major_chord`
--
ALTER TABLE `major_chord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=49;

--
-- テーブルの AUTO_INCREMENT `minor_chord`
--
ALTER TABLE `minor_chord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=25;

--
-- テーブルの AUTO_INCREMENT `nice`
--
ALTER TABLE `nice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- テーブルの AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=56;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
