-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 07 月 04 日 21:00
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `company`
--

-- --------------------------------------------------------

--
-- 資料表結構 `company_users`
--

CREATE TABLE `company_users` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `create_time` datetime NOT NULL,
  `logo` varchar(20) NOT NULL,
  `intro` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `company_users`
--

INSERT INTO `company_users` (`id`, `name`, `email`, `password`, `phone`, `address`, `create_time`, `logo`, `intro`) VALUES
(1, 'Tefal 特福', 'tefal@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)77430640', '台北市忠孝東路5段8號6樓', '1990-01-09 14:33:30', 'tefal.png', '特福（Tefal）是法國炊具和小型家電製造商，自1968年以來隸屬於SEB集團。它的名字是TEFlon和ALuminium的混成詞。該公司以創建不粘鍋炊具類別以及提供對脂肪或油的需求量低的油炸設備而聞名。在美國，Tefal以T-fal的形式銷售。'),
(2, 'Philips 飛利浦', 'philips@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)22233646', '新北市中和區中正路766號5樓', '1992-05-08 14:47:33', 'philips.png', '皇家飛利浦，全稱荷蘭皇家飛利浦公司，簡稱飛利浦，是荷蘭的跨國電子公司，總部設在阿姆斯特丹。由赫拉德·飛利浦和父親弗雷德里克·飛利浦於1891年在荷蘭安多芬創建。飛利浦在2010年254.2億歐元的收入，使它成為世界上最大的電子公司之一。它在60多個國家雇用約114500名員工。'),
(3, 'Bear小熊', 'bear@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)29955886', '新北市三重區重化街28號3樓', '1995-06-07 14:47:33', 'bear.jpeg', '小熊電器，專注創意小家電16年。 以創新多元、精致時尚、小巧好用的產品，為年輕人帶來驚喜有趣的生活體驗。'),
(4, 'Panasonic', 'panasonic@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(03)4752829', '桃園市楊梅區新農街343號', '1996-08-06 20:33:01', 'panasonic.jpg', '松下電器，正式名稱為Panasonic控股株式會社是源自日本的跨國電機製造商，也是日本前八大電機企業之一，總部位於大阪府門真市。美國《財富》雜誌「世界500強」評選排名第110位。 Panasonic該字由「pan」與「sonic」組成，由於一開始Panasonic品牌用於販售音訊設備。6'),
(5, 'SAMPO 聲寶', 'sampo@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(03)4783641', '桃園市楊梅區大成路153號', '1996-11-29 20:33:01', 'sampo.jpg', '聲寶股份有限公司，簡稱聲寶集團、聲寶公司、聲寶，是台灣一家大型電子產品製造公司，也是歷史悠久的家電大廠。聲寶成立於1936年，前身為「東正堂無線電器行」，1962年9月11日，改名為「東興電器」及1964年改名為「聲寶電器」，由陳茂榜及其弟陳茂標共同創辦。'),
(6, 'KRIA可利亞', 'kria@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)27625290', '台北市松山區八德路四段345號2樓', '1997-01-09 20:34:41', 'kria.jpeg', 'KRIA可利亞創意家電生活館，擁有30年的專業品質，完善的服務保證！本店產品多屬創意實用小家電，讓您的生活充滿驚喜。無論是生活家電、廚房家電、健康家電…等，都能帶給客戶最好的服務。'),
(7, 'SodaStream', 'sodastream@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)29989288', '新北市新莊區公園路63號', '1997-05-29 20:34:41', 'sodastream.jpg', 'SodaStream是世界上最大的氣泡水機品牌，行銷全球45個國家，超過80,000個銷售據點。產品涵蓋氣泡水機、二氧化碳鋼瓶、寶特瓶與糖漿。'),
(8, 'BubbleSoda', 'bubblesoda@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(04)23160022', '台中市西屯區長安路一段61號', '1997-10-25 20:37:08', 'bubbleSoda.png', 'BubbleSoda氣泡水機不只講求生活態度，也追求優質設計與高品質生活。'),
(9, 'AGiM 阿基姆', 'agim@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)77430640', '台北市忠孝東路5段8號6樓', '1998-06-09 20:37:08', 'agim.png', '法國．阿基姆AGiM致力於研發、製造、銷售電信通訊、OA辦公類、時尚家電等產品，不論是生活家電、廚房家電、智能家電各類小家電都有！ JC科技正版授權販售多功能魔力料理棒、二用電燒烤爐、健康SPA沖牙機等多樣家用產品，只給你最好的產品！'),
(10, 'Oceanrich', 'oceanrich@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)22233646', '新北市中和區中正路766號5樓', '1998-08-07 20:38:49', 'oceanrich.png', 'oceanrich致力於提供簡單、有趣的咖啡器具，希望可以精簡精品咖啡製作步驟，降低手沖難度，隨時隨地還原大師級手沖咖啡的滋味。'),
(11, 'HERAN 禾聯', 'heran@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)29955886', '新北市三重區重化街28號3樓', '1999-04-25 20:38:49', 'heran.png', '禾聯碩股份有限公司是台灣一間以電子工業為業務核心的企業。其前身為聯碩光電，於2009年8月更改為現名。該公司股票於2011年上興櫃；2019年5月24日上市。'),
(12, 'SMEG', 'smeg@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(03)4752829', '桃園市楊梅區新農街343號', '2001-05-06 20:41:10', 'smeg.png', '創立於2015年4月的品硯實業，是目前全台最受矚目的頂級進口廚電品牌代理商。創辦人曾增枝，擁有超過二十餘年的廚衛產業經驗，也曾是許許多多知名進口廚電品牌首度進入台灣市場的幕後推手。'),
(13, 'CHIMEI 奇美', 'chimei@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(03)4783641', '桃園市楊梅區大成路153號', '2002-11-26 20:41:10', 'chimei.png', '2006年奇美集團新增發展B2C「CHIMEI奇美品牌」事業，由奇美實業轉投資新視代科技股份有限公司進行全球營運，現全世界已註冊超過70個國家。「CHIMEI奇美品牌」堅持對產品的安全、品質、節能省電等消費者基本安心需求，堅持「心·好感」的體驗，堅信幸福的根源，是來自消費者百分百的安心滿意。'),
(14, 'Cuisinart', 'cuisinart@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)27625290', '台北市松山區八德路四段345號2樓', '2002-12-25 20:43:12', 'cuisinart.jpg', 'Cuisinart是Conair公司擁有的美國家電品牌。該公司於1971年由Carl Sontheimer創立，旨在將電動食品加工機推向美國市場。“食品加工機”是1973年在芝加哥的食品展上推出的第一個型號。名稱“ Cuisinart”成為“食品加工機”的同義詞。它也是“美食”和“藝術”的混成詞。'),
(15, 'Hamilton Beach', 'hamiltonbeach@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)29989288', '新北市新莊區公園路63號', '2003-03-09 20:43:12', 'hamiltonbeach.jpg', '漢美馳海灘品牌控股公司（Hamilton Beach Brands Holding Company）是一家美國設計師，營銷商和分銷商，主要在美國，加拿大和墨西哥銷售家用電器和商用餐廳設備，包括攪拌機，攪拌機，烤麵包機，慢燉鍋，電熨斗和空氣淨化器。'),
(16, 'Siroca', 'siroca@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(04)23160022', '台中市西屯區長安路一段61號', '2003-08-15 20:44:44', 'siroca.svg', 'siroca是2000年在日本東京創立的新銳品牌。時尚與親切的產品設計、容易入手的產品價格、給予顧客超值的產品體驗，是siroca的核心價值。'),
(17, 'Danby', 'danby@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)77430640', '台北市松山區八德路四段345號2樓', '2003-10-09 20:44:44', 'danby.png', 'ROYAL STAR（宏信國際），多年來秉持著為家庭帶來更有質感的生活體驗並提供誠摯尊貴的服務，精選家電品牌，提供更多新生活方案，我們把關商品品質，提供優惠價格，滿足客戶，建立各品牌與消費者的橋梁，並帶領市場與電器產品的需求，引進合適且新穎商品，讓消費者能夠輕鬆找到適合自己的產品。'),
(18, '小米', 'xiaomi@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)22233646', '新北市新莊區公園路63號', '2004-02-25 20:46:22', 'xiaomi.png', '小米公司正式成立於 2010 年 4 月，是家專注於先進智慧手機、互聯網電視以及智慧家庭生態鏈建設的創新型科技公司。'),
(19, 'snapware', 'snapware@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)29955886', '台中市西屯區長安路一段61號', '2004-09-28 20:46:22', 'snapware.png', 'Corelle Brands, LLC (name changed into Instant Brands, LLC in 2021) is a world leader in kitchenware industry. Headquartered in Rosemont, Illinois, USA. We manufactureand market iconic family of brands – Corelle®, Corningware®, Instant Pot®, Pyrex®, Snapware®, Chicago Cutlery® and Visions®, worldwide. We began as the Corning Consumer Products Company, a division of the glassmaker Corning Inc., and was also known as \"World Kitchen\" from 2000 until 2018.'),
(20, 'TATUNG大同', 'tatung@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(03)4752829', '台北市忠孝東路5段8號6樓', '2005-08-23 20:48:03', 'tatung.jpg', '大同公司是臺灣一家以電子工業為業務核心之綜合企業，創立於大正7年，事業版圖橫跨半導體、通路、營造，及貿易等領域，為臺灣首批上市企業之一。集團總部位於臺北市圓山。 大同公司主要分為電力、系統、消費等3大事業群， 旗下包含電力設備-重電、電力設備-電纜、馬達、太陽能、系統整合、智慧電錶、先端電子及家電電子等8大事業體。'),
(21, 'TOSHIBA 東芝', 'toshiba@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(03)4783641', '新北市中和區中正路766號5樓', '2006-01-15 20:48:03', 'toshiba.png', '東芝（Toshiba）是日本最大的半導體製造商，也是第二大綜合電機製造商，隸屬於三井集團。 公司創立於1875年7月，原名東京芝浦電氣株式會社，1939年由東京電氣株式會社和芝浦製作所合併而成。 東芝擁有日本最大規模的研究開發設施，不懈的創新和開拓，使東芝一直走在世界科學技術的前沿。'),
(22, 'Bruno', 'bruno@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)27625290', '桃園市楊梅區大成路153號', '2006-05-23 20:49:08', 'bruno.webp', 'Bruno. 成立於2012年9月，2018年底在台灣上市後，短短半年就造成爆發性的突破及成長，反映出台灣消費者對家電的定義不再只侷限於一般家電，消費者更想擁有一款外觀功能兼備，且能增添更多烹飪樂趣的風格家電。 分別注入在品牌旗下所有商品中。 「享受料理、品味生活，將這份同樂的愉悅氛圍分享給身旁所有的人」。'),
(23, 'Sansui', 'sansui@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)29989288', '台北市松山區八德路四段345號2樓', '2007-09-09 20:49:08', 'sansui.png', 'Sansui，即日語「山水」，為過去一家日本電器製造商山水電氣株式會社，以及現今冠名使用的電器品牌。'),
(24, 'TELEFUNKEN 德律風根', 'telefunken@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(04)23160022', '新北市新莊區公園路63號', '2008-10-10 20:50:30', 'telefunken.png', '德律風根，是德國一家家庭電器生產商。'),
(25, 'Deerma 德爾瑪', 'deerma@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(03)4783641', '台中市西屯區長安路一段61號', '2009-10-28 20:50:30', 'deerma.jpg', '德爾瑪(DEERMA)，創立於2011年的創新電器品牌，專注於環境加濕、吸塵清潔、生活小家電、廚房小家電等品類產品研產銷，全產業鏈直控和精準選品，生產出設計好、品質好和高性價比的創新小家電。'),
(26, 'Kolin 歌林', 'kolin@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)27625290', '台北市松山區八德路四段345號2樓', '2009-11-21 20:51:52', 'kolin.png', '「歌林Kolin」是台灣知名的家電品牌，創立於1963年。歌林所經營製造販售的家電商品，涵蓋液晶電視、冰箱、洗衣機、移動式冷氣、移動式空調以及各種生活、廚房、美容、健康小家電。'),
(27, 'Vitantonio', 'vitantonio@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)29989288', '新北市新莊區公園路63號', '2010-09-06 20:51:52', 'vitantonio.jpg', 'Vitantonio為1999年成立的日本消費性小家電品牌，以打造簡潔外觀及符合消費者使用需求為設計宗旨，其高質感鬆餅機廣受亞洲消費者喜愛。'),
(28, 'Recolte 麗克特', 'recolte@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(04)23160022', '台北市松山區八德路四段345號2樓', '2011-07-01 20:52:53', 'recolte.svg', '創立於1992年的 Winner’s Co.Ltd. 在2009年以 récolte 在日本推出；récolte 在法語是「收集」、「收穫」的意思récolte 的商標設計概念是「多彩、精緻小巧」集合簡約、時尚、多彩和小巧等多種特色，同時主打小家庭和單身族客層，商品除了體積小之外，色彩多變、外型簡約且操作簡單…等，這些特色也讓 récolte 成為日本單身貴族在添購家電時的優先選擇。簡潔的線條、精緻的包裝，適合摯友送禮，絕對讓人愛不釋手récolte 提出獨特的生活提案，為生活情境增加變化，為居家品味大大加分!'),
(29, 'KINYO', 'kinyo@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(03)5396966', '新竹市東區經國路一段187號', '2015-06-30 20:52:53', 'kinyo.webp', '陪伴大家走過40多年的在地品牌KINYO，相信你一定不陌生。經歷時間考驗與淬鍊，在市場中站穩了腳步，並選擇一個全新面貌重回到消費者面前。當眾多複雜的功能與花俏的商品來到眼前，你是否期待有個品牌，能夠持續保持「Simplicity and quality」來優化你的生活品質？期望透過簡約美型、多功能實用且高CP值的家電產品，與市場大眾進行生活連結、體驗深化，並產生共鳴。'),
(30, 'YAMASAKI山崎', 'yamasaki@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)29955886', '新北市三重區重化街28號3樓', '2020-11-08 20:54:08', 'yamasaki.png', '日本山崎自創業以來因為引進歐美的先進技術而卓越成長並希望以此經驗技術可以對東南亞吃的文化帶來貢獻。 故於1981年進駐香港，之後在香港廣受各方好評，於1988年設立了中央工廠，日本山崎自此開始了海外的連鎖烘焙事業。'),
(31, 'CookPower鍋寶', 'cookpower@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '(02)26593375', '新北市三重區五華街282號', '1990-11-25 20:54:08', 'cookpower.png', '\"鍋寶股份有限公司創立於1990年，主要從事家用、廚具用品行銷及製造，是台灣家喻戶曉的廚具品牌。\r\n本公司擁有優秀的經營團隊，秉持著「創造廚具精品」的經營理念，追求企業永續經營及成長。\"');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `company_users`
--
ALTER TABLE `company_users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `company_users`
--
ALTER TABLE `company_users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
