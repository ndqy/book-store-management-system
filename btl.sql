-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3366
-- Thời gian đã tạo: Th3 13, 2024 lúc 04:00 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbook`
--

CREATE TABLE `tblbook` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `book_name` varchar(300) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Ten san pham',
  `book_image` varchar(200) DEFAULT NULL COMMENT 'Anh san pham',
  `book_price` int(10) UNSIGNED DEFAULT NULL COMMENT 'Gia san pham',
  `book_discount_price` int(10) UNSIGNED DEFAULT NULL COMMENT 'Gia chiet khau',
  `book_deleted` tinyint(1) DEFAULT 0 COMMENT 'Danh dau xoa san pham',
  `book_visited` smallint(5) UNSIGNED DEFAULT NULL COMMENT 'Luot xem san pham',
  `book_total` smallint(5) UNSIGNED DEFAULT NULL COMMENT 'So luong trong kho',
  `book_manager_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Nguoi cap nhat',
  `book_intro` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL COMMENT 'Gioi thieu chung',
  `book_notes` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL COMMENT 'Ghi chu',
  `book_created_date` varchar(45) DEFAULT NULL COMMENT 'Ngay cap nhat',
  `book_modified_date` varchar(45) DEFAULT NULL COMMENT 'Ngay sua',
  `book_category_id` smallint(5) UNSIGNED NOT NULL COMMENT 'The loai sach',
  `book_author_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Ten tac gia',
  `book_ps_id` smallint(3) UNSIGNED NOT NULL COMMENT 'He san pham',
  `book_is_detail` tinyint(1) DEFAULT NULL COMMENT 'Da duoc cap nhat chi tiet chua?',
  `book_sold` smallint(5) UNSIGNED DEFAULT NULL COMMENT 'So luong da ban',
  `book_best_seller` tinyint(1) DEFAULT NULL COMMENT 'Ban chay?',
  `book_promotion` tinyint(1) DEFAULT NULL COMMENT 'Khuyen mai',
  `book_size` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL COMMENT 'Kich thuoc',
  `book_publisher` varchar(200) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `book_paperback` tinyint(1) DEFAULT NULL COMMENT '1 la bia mem 0 la bia cung',
  `book_page` int(11) DEFAULT NULL COMMENT 'so trang',
  `book_translator` varchar(200) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbook`
--

INSERT INTO `tblbook` (`book_id`, `book_name`, `book_image`, `book_price`, `book_discount_price`, `book_deleted`, `book_visited`, `book_total`, `book_manager_id`, `book_intro`, `book_notes`, `book_created_date`, `book_modified_date`, `book_category_id`, `book_author_name`, `book_ps_id`, `book_is_detail`, `book_sold`, `book_best_seller`, `book_promotion`, `book_size`, `book_publisher`, `book_paperback`, `book_page`, `book_translator`) VALUES
(1588, 'Giao dịch theo xu hướng để kiếm sống test', '../../../lib/imgs/1.jpg', 3660000, 0, 0, NULL, 1000, 58, '', '<h2>GIAO DỊCH THEO XU HƯỚNG ĐỂ KIẾM SỐNG<br><br>&nbsp;</h2><h2><strong>*** Sách trong \"Chuỗi Sách Giao Dịch Thực Chiến\" của FinFin</strong></h2><p><strong>Giao Dịch Theo Xu Hướng - Trend Following</strong> là phương pháp giao dịch cơ bản nhất, nổi tiếng nhất và được khuyên dùng nhiều nhất đối với bất kỳ nhà giao dịch nào, đặc biệt với các nhà giao dịch mới bắt đầu sự nghiệp.<br><br>Một thế hệ nhà giao dịch lừng danh Phố Wall với trường phái Giao Dịch Theo Xu Hướng đã được ra đời từ chương trình đào tạo Nhà Giao Dịch Rùa (Turtle Traders) của Richard Dennis và William Eckhartd những năm 1980, biến những người nghiệp dư thành những nhà giao dịch chuyên nghiệp đã truyền cảm hứng cho các nhà giao dịch theo xu hướng vững tin vào câu chuyện “việc trở thành nhà giao dịch chuyên nghiệp hoàn toàn có thể do đào tạo mà thành, chứ không phải năng khiếu bẩm sinh”.<br><br>Điều luôn khắc cốt ghi tâm của các nhà giao dịch chuyên nghiệp luôn là “Hãy đi theo xu hướng” hay “Xu hướng là bạn” hoặc “Đừng chống lại xu hướng”, và sách <strong>Giao Dịch Theo Xu Hướng Để Kiếm Sống</strong> chia sẻ lại tư duy, phương pháp giao dịch thực tế cũng như các giao dịch thực chiến đã thực hiện của tác giả Andrew Abraham trong suốt 18 năm ông đầu tư vào các quỹ giao dịch theo xu hướng cũng như tự mình quản lý vốn và giao dịch theo xu hướng.<img src=\"../../../lib/imgs/e2251536324d088d8d6aa035d66c9fb6.jpg\"></p><h3><strong>I.Vì sao nên đọc sách Giao Dịch Theo Xu Hướng Để Kiếm Sống</strong></h3><p>Dưới đây là một số lý do mà bạn nên đọc quyển sách này:</p><ul><li>Nhấn mạnh vào đầy đủ 3M của việc giao dịch thành công, gồm Mindset (tư duy/tâm lý giao dịch), Method (phương pháp giao dịch) và Money Management (quản lý vốn/quản lý rủi ro).</li><li>Các ví dụ thực chiến từ chính nhật ký giao dịch của tác giả.</li><li>Chia sẻ cách thức tác giả làm thế nào để giữ vững kỷ luật giao dịch.</li><li>Câu chuyện của một “tay nghiệp dư” (là tác giả) đi tìm các nhà giao dịch theo xu hướng thành công để ủy thác đầu tư từ năm 1994.</li><li>Tư duy và cách thức các nhà quản lý quỹ ủy thác giao dịch theo xu hướng đang vận hành.</li><li>Hiệu suất lợi nhuận của các quỹ ủy thác giao dịch theo xu hướng trong hàng chục năm.</li><li>Phương pháp giao dịch theo xu hướng thành công của tác giả, vốn đã giúp tác giả tự do tài chính.</li><li>Cách thức đầu tư vào các quỹ giao dịch theo xu hướng để quản trị và phân tán rủi ro tối ưu.<br><br>&nbsp;</li></ul><h3><strong>II.Về tác giả Andrew Abraham</strong></h3><figure class=\"image\"><img src=\"../../../lib/imgs/8532f3770dacd61f64b2dd32b939d38d.jpg\"></figure><p>&nbsp;</p><p>Andrew Abraham (cộng đồng&nbsp; chuyên nghiệp gọi ông là Andy) là một người “thực chiến” và đã thực sự đặt “da thịt vào cuộc chơi” (skin in the game - tức là trải nghiệm thực tế chứ không lý thuyết suông). Tính đến thời điểm cho ra mắt quyển sách vào 2012, Andy đã:</p><ul><li>Có 18 năm kinh nghiệm đầu tư tiền vào các quỹ hoặc các nhà quản lý vốn theo phương pháp giao dịch theo xu hướng.</li><li>Chính bản thân Andy cũng là một nhà giao dich theo xu hướng thành công.</li></ul><p>Kết hợp việc tự giao dịch và ủy thác vào các quỹ giao dịch theo xu hướng, Andrew Abraham đã đạt được tự do tài chính.<br><br>&nbsp;</p><h3><strong>III.Sách \"Giao Dịch Theo Xu Hướng Để Kiếm Sống\" phù hợp với đối tượng nào?</strong></h3><ul><li>Những nhà giao dịch muốn tìm hiểu Tư duy/ Phương pháp giao dịch/ Cách quản lý vốn - quản lý rủi ro của một nhà giao dịch theo xu hướng chuyên nghiệp.</li><li>Những nhà giao dịch muốn tìm hiểu hiệu suất lợi nhuận của một số quỹ ủy thác đầu tư giao dịch theo xu hướng tiêu biểu.</li><li>Những nhà giao dịch thực sự quan tâm đến cách vận hành một hệ thống giao dịch khách quan (systematic trading), có thể tự động hóa.<br><br>&nbsp;</li></ul><h3><strong>IV.Giới thiệu Dịch giả</strong></h3><p>Sách&nbsp;<strong>Giao Dịch Theo&nbsp;&nbsp;Để Kiếm Sống&nbsp;</strong>được chuyển ngữ bởi anh Khưu Bảo Khánh và hiệu đính bởi anh Dương Huy, đều là cá nhân trải nghiệm nhiều năm trên thị trường tài chính, đảm bảo chất lượng dịch thuật/ hiệu đính. Dưới đây là một số thông tin của dịch giả và hiệu đính:</p><ul><li><strong>Anh Khưu Bảo Khánh</strong>: bắt đầu giao dịch trên thị trường tài chính (chứng khoán, tiền tệ, tiền thuật toán) từ năm 2013. Anh có bằng thạc sĩ tài chính, CMT level 1 và hiện là giảng viên. Anh đồng thời là biên tập viên lâu năm của diễn đàn TraderViet.</li><li><strong>Anh Dương Huy :</strong>tham gia vào lĩnh vực tài chính từ năm 2007 và đã giao dịch nhiều sản phẩm, thị trường khác nhau. Anh hiện là quản trị viên diễn đàn TraderViet.<br><br>&nbsp;</li></ul><h3><strong>V.Mục lục sách Giao Dịch Theo Xu Hướng Để Kiếm Sống</strong></h3><p>Sách bản tiếng Việt bìa cứng, in màu, gồm 328 trang chia làm 10 chương:</p><ul><li>Chương 1: Hãy khởi đầu khôn ngoan</li><li>Chương 2: Khai thác tối đa lợi thế của phương pháp giao dịch theo&nbsp;</li><li>Chương 3: Tại sao lại là giao dịch theo&nbsp;</li><li>Chương 4: Những nhà giao dịch theo&nbsp;thành công như thế nào</li><li>Chương 5: Quản lý rủi ro khi giao dịch theo&nbsp;</li><li>Chương 6: Xây dựng kế hoạch hoàn chỉnh và vững chắc</li><li>Chương 7: Giao dịch bứt phá theo&nbsp;</li><li>Chương 8: Giao dịch thoái lui theo&nbsp;</li><li>Chương 9: Tư duy giao dịch theo&nbsp;</li><li>Chương 10: Nhật ký giao dịch của tôi</li></ul><p>&nbsp;</p><p><br><br>&nbsp;</p><p>​</p><p>&nbsp;</p><p><br><br>&nbsp;</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '04/12/2003', '2023-12-07', 1, 'Andrew Abraham test', 0, NULL, NULL, 0, 0, '30x30cm', 'Nhà Xuất Bản Thanh Niên test', 0, 328, 'Khưu Bảo Khánh - Hiệu đính: Dương Huy'),
(1589, 'Thần số học và ứng dụng', '../../../lib/imgs/5.jpg', 85000, 0, 0, NULL, 6868, 55, '', '<figure class=\"image\"><img src=\"../../../lib/imgs/cf163e1c99f5b369651399360ef4be6a.jpg\"></figure><figure class=\"image\"><img src=\"../../../lib/imgs/3011bb086e39deeb1d8b9811f1c7a47b.jpg\"></figure><p>Mỗi cái tên, mỗi ngày tháng và mỗi con số đều mang những ý nghĩa riêng và có thể giúp bạn hiểu sâu sắc hơn về bản thân, các mối quan hệ và số phận của mình.</p><p>Bạn có từng băn khoăn khi tình cờ nhìn thấy các dãy số lặp lại như 11:11 hay 444 hay ngày sinh của bạn bè, người thân?</p><p>Bạn có từng thắc mắc tại sao ngay trong lần gặp đầu tiên có những người mang lại cho bạn cảm giác thân thiết, những người khác lại không?</p><p>Tất cả những thắc mắc, băn khoăn của bạn sẽ được giải đáp trong cuốn <strong>Thần Số Học Ứng Dụng.</strong></p><p>Cuốn sách sẽ cung cấp mọi thứ bạn cần để mài giũa trực giác của mình, hiểu rõ hơn những người xung quanh và thậm chí có thêm tự tin khi đưa ra các quyết định lớn.</p><p>Thần số học cũng có thể giúp bạn nhìn lại quá khứ. Khi suy ngẫm về các sự kiện của cuộc đời mình và cách chúng diễn ra trong các chu kỳ số, bạn sẽ nhìn nhận rõ ràng hơn về những gì đã xảy ra và nguyên nhân của những điều đó.<br>Biết được những gì bạn sắp phải trải qua trong một năm, tháng hoặc ngày cụ thể giúp bạn điều hướng chu kỳ cuộc sống dễ dàng hơn. Bạn sẽ có thể dự đoán và chuẩn bị cho những thử thách sắp tới cũng như tận dụng các cơ hội tuyệt vời và đầy tiềm năng.</p><p>Đặc biệt, bạn có thể đánh thức tiềm năng to lớn của mình với:</p><ul><li>Những con số cốt lõi: Khám phá ảnh hưởng của ngày sinh đến tâm hồn, tính cách và số phận của bạn.</li><li>Việc diễn giải mối quan hệ: Rút ra ý nghĩa từ các con số để làm sáng tỏ các mối quan hệ giữa bạn với gia đình, bạn bè, đồng nghiệp và những người quan trọng khác.</li><li>Những hiểu biết siêu hình: Tìm hiểu xem tarot, chiêm tinh, tinh thể và chu kỳ Mặt Trăng có thể giúp bạn hiểu sâu hơn về những điều kỳ diệu trong cuộc sống như thế nào.</li></ul><p>Thông qua cuốn sách này, bạn sẽ hiểu rõ hơn về những con số xung quanh mình, lập và giải mã được các biểu đồ cơ bản, đồng thời hiểu được những rung động và năng lượng trong cuộc sống hằng ngà</p><p><strong>Thông tin tác giả:</strong></p><p>Joy Woodward là một nhà Thần số học Pythagoras, người thực hành chữa lành bằng tinh thể được chứng nhận và là người sáng lập ra The Joy of Numerology. Cô đã thực hiện hàng nghìn lượt diễn giải cho khách hàng từ khắp nơi trên thế giới. Cô cũng là người dẫn chương trình truyền hình Joy of Numerology trên CATV1.</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p><figure class=\"image\"><img src=\"https://salt.tikicdn.com/ts/review/6e/8e/69/698aea6db2d2ab5ecd2679a61cd7cec7.jpg\"></figure><p>&nbsp;</p><p>&nbsp;</p>', '2023-12-05', '2023-12-07', 1, ' Joy Woodward', 0, 0, 0, 0, 0, ' 13 x 20 cm', ' Nhà Xuất Bản Thanh Niên', 1, 123, ' 1980Books'),
(1590, 'Bắt đầu câu hỏi tại sao', '../../../lib/imgs/7.jpg', 100000, 0, 0, NULL, 1000, 58, '', '<figure class=\"image\"><img src=\"https://salt.tikicdn.com/ts/review/e3/c0/60/df0bb6b87a0c6bca191e851f16db54b8.jpg\"></figure><p>Lần đầu tiên khi tôi khám phá ra sức mạnh của lý do TẠI SAO là khi tôi cần đến nó trong cuộc đời mình. Nó không phải là kết quả của việc theo đuổi con đường học vấn của tôi. Nó đã xuất hiện khi tôi không còn cảm hứng với công việc của mình và cảm thấy vô cùng chán nản và thất vọng. Thực tế là đã không có vấn đề gì xảy ra với công việc của tôi, mà do tôi đã đánh mất niềm vui trong công việc mình làm. Nếu xét trên phương diện bề ngoài thì tôi nên vui mới phải. Tôi đã nhận được những khoản thù lao tốt và được làm việc với những đối tác tuyệt vời. Nhưng tôi đã trở nên vô cảm với những gì mình làm. Tôi không còn cảm thấy hài lòng với công việc của mình và cần tìm ra cách để nhóm lên ngọn lửa nhiệt huyết và đam mê thêm một lần nữa.</p><figure class=\"image\"><img src=\"https://salt.tikicdn.com/ts/review/cd/9d/7e/f854c4ef2e17d550a35629660ec4241c.jpg\"></figure><p>Việc khám phá tầm quan trọng của lý do TẠI SAO đã hoàn toàn thay đổi cái nhìn của tôi về thế giới. Và việc khám phá ra lý do TẠI SAO của chính mình đã giúp tôi tìm lại được niềm đam mê còn cháy bỏng hơn gấp bội so với trước đây. Tôi đã chia sẻ ý tưởng vô cùng đơn giản, mạnh mẽ và thực tế này với bạn bè. Khi học hỏi được điều gì có giá trị, chúng tôi thường chia sẻ nó với những người mình yêu mến. Thật tuyệt vời vì những người bạn tôi đã bắt đầu có những thay đổi lớn lao trong cuộc đời. Và họ đã mời tôi chia sẻ ý tưởng này với bạn bè của họ và những người mà họ yêu mến. Từ đó ý tưởng này bắt đầu được lan truyền.</p><p>Chính tại thời điểm này tôi đã quyết định biến mình thành vật thí nghiệm. Bởi vì tôi không thể chia sẻ và đề cao một khái niệm mà chính tôi cũng không thực hiện. Vì vậy tôi đã cố gắng thực hành nó nhiều nhất có thể. Lý do duy nhất khiến tôi được như ngày hôm nay, được sống và làm việc với lý do TẠI SAO của mình, đó là nhờ sự giúp đỡ của tất cả mọi người.</p><p>Tôi không có những nhân viên quảng cáo, và cũng không thường xuyên được lên báo chí. Mặc dù vậy khái niệm TẠI SAO vẫn đang được lan truyền rộng rãi bởi vì nó được cộng hưởng sâu thẳm trong thâm tâm người khác khiến họ chia sẻ nó với những người mà họ yêu thương và quan tâm. Cuốn sách này giúp tôi có cơ hội để lan tỏa chiều sâu của ý tưởng này tới tất cả mọi người mà không cần sự có mặt của tôi. Bài nói chuyện trên TEDx của tôi được đăng trên trang đã tự nó lan truyền rộng rãi mà không cần đến bất cứ chiến lược truyền thông nào. Nó được lan truyền như vậy bởi vì thông điệp này tự nó vốn lạc quan và đầy tính nhân văn. Vì vậy những ai tin tưởng vào nó sẽ tự động chia sẻ nó.</p><p>Càng có nhiều cá nhân và tổ chức biết cách bắt đầu với lý do TẠI SAO, sẽ càng có nhiều người thức dậy mỗi ngày với cảm giác mãn nguyện với công việc họ đang làm. Và đó là lý do tốt nhất tôi có thể nghĩ tới để tiếp tục chia sẻ ý tưởng này.<br>Hãy luôn tràn đầy cảm hứng, các bạn nhé!</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', '2023-12-05', '2023-12-07', 1, ' Simon Sinek', 0, 0, 0, 0, 0, ' 14.5 x 20.5 cm', 'Thần số học và ứng dụng', 0, 123, ' Hoàng Việt'),
(1591, 'Đàn ông sao hỏa đàn bà sao kim', '../../../lib/imgs/6.jpg', 100000, 0, 0, NULL, 1000, 58, '', '<p><strong>Đàn ông sao hỏa đàn bà</strong></p><p><strong>Đàn ông sao hỏa đàn bà sao kim</strong></p><ol><li>Đàn ông sao hỏa đàn bà sao kim</li><li>Đàn ông sao hỏa đàn bà sao kim</li><li>Đàn ông sao hỏa đàn bà sao kim</li><li>Đàn ông sao hỏa đàn bà sao kim sao kim</li></ol><p><strong>àn ông sao hỏa đàn bà</strong></p><p><strong>Đàn ông sao hỏa đàn bà sao kim</strong></p><ol><li>Đàn ông sao hỏa đàn bà sao kim</li><li>Đàn ông sao hỏa đàn bà sao kim</li><li>Đàn ông sao hỏa đàn bà sao kim</li><li>Đàn ông sao hỏa đàn bà sao kim sao kim</li></ol><figure class=\"image\"><img src=\"../../../lib/imgs/6.jpg\"></figure><figure class=\"image\"><img src=\"../../../lib/imgs/5.jpg\"></figure><figure class=\"image\"><img src=\"../../../lib/imgs/4.jpg\"></figure>', '2023-12-05', '2023-12-05', 57, 'AAAA', 0, 0, 0, 0, NULL, '30x30cm', 'Thần số học và ứng dụng', 0, 123, NULL),
(1592, 'Kế Toán Vỉa Hè - Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', '../../../lib/imgs/db4f09b6ee8bc317f097ebcca1933a2d.png.webp', 160000, 0, 0, NULL, 1000, 58, '', '<h2><strong>BIẾN KẾ TOÁN KHÔ KHAN TRỞ THÀNH TRÒ CHƠI CON TRẺ, DỄ HIỂU VÀ DỄ ÁP DỤNG</strong></h2><p>Đã bao lần bạn cầm trên tay bảng báo cáo tài chính doanh nghiệp của mình, nhưng chẳng thể nào hiểu nổi?&nbsp;</p><p>Kế toán và tài chính là nỗi đau chung của rất nhiều doanh nghiệp nhỏ. Ngôn ngữ tài chính dường như là điều bí ẩn nhất của thế giới. Vô số tính toán và ý đồ được cài cắm sau các con số, mà thậm chí người kinh doanh nhiều năm cũng không thể nào bóc tách nổi.<br>Nếu bạn vẫn cảm thấy mù mờ với bảng báo cáo tài chính của mình thì thật là đáng tiếc. Tài chính được xem như là ngôn ngữ của kinh doanh. Bảng kế toán sẽ cho bạn biết được doanh nghiệp của mình lời hay lỗ, trả lời câu hỏi vì sao trông bạn có vẻ đang ăn nên làm ra, nhưng két sắt công ty không có lấy một đồng.</p><p><strong>Quyển sách mang đến cho bạn:</strong></p><ul><li>Kiến thức căn bản về kế toán doanh nghiệp.</li><li>Phân biệt 3 loại báo cáo tài chính quan trọng nhất.</li><li>Phân tích chức năng của mỗi loại báo cáo trong quản trị doanh nghiệp.</li><li>Hiểu và tự lập được bảng cân đối kế toán, báo cáo kết quả kinh doanh, báo cáo luân chuyển tiền tệ.</li><li>Đánh giá sơ bộ được sức khỏe tài chính của doanh nghiệp thông qua 3 báo cáo tài chính trên.</li></ul><p><strong>Bạn càng am hiểu sớm kế toán và báo cáo tài chính, càng có lợi cho công việc kinh doanh lâu dài.</strong></p><h3>&nbsp;</h3><h3><strong>VỀ TÁC GIẢ</strong></h3><p><strong><img src=\"https://salt.tikicdn.com/ts/tmp/0f/04/28/ab2219357d5378d064f761f4a7e74e4b.jpg\" alt=\"\"></strong></p><h3><strong>VỀ DỊCH GIẢ</strong></h3><p><img src=\"https://salt.tikicdn.com/ts/tmp/9b/87/44/a701c5040c7b521e8e2f786661db6e68.png\" alt=\"\"></p><p>TRẦN THANH PHONG</p><p>Trần Thanh Phong là tác giả, chủ doanh nghiệp và vận động viên ba môn phối hợp Ironman. Anh được mọi người nhắc đến như là, tác giả Việt đầu tiên viết về chủ đề Khởi nghiệp kinh doanh thực chiến. Tác phẩm tiêu biểu:</p><ul><li>Khởi nghiệp bán lẻ.</li><li>Khởi nghiệp du kích.</li><li>Đừng để mất bò.</li><li>Trên lưng khổng tượng.</li></ul><p>Không phải học giả hay diễn giả, anh là người làm nghề thực thụ. Sau 15 năm khởi nghiệp, quản lý nhiều công việc kinh doanh, từ bán lẻ đến thương mại điện tử, anh đã đúc kết nhiều kinh nghiệm thực tế và gói gọn chúng trong những cuốn sách của mình.</p><h3><strong>TÓM TẮT SÁCH</strong></h3><p>Cuốn sách chia làm 10 chương:</p><p><strong>Chương 1: Bảng cân đối kế toán. </strong>Giới thiệu về bảng cân đối kế toán. Chi phí khác gì với chi phí sản xuất? Giá vốn hàng bán và giá thành có giống nhau không?</p><p><strong>Chương 2: Báo cáo kết quả hoạt động kinh doanh.</strong> Giới thiệu về báo cáo kết quả hoạt động kinh doanh, lợi nhuận gộp, lợi nhuận ròng, thu nhập và dòng tiền. Làm sao để nhận ra, tình hình kinh doanh của bạn đang tốt lên hay xấu đi?</p><p><strong>Chương 3: Kế toán nợ phải trả.</strong> Vay vốn là hoạt động cần thiết để kinh doanh. Chương này giúp bạn hiểu cách theo dõi các khoản vay, khoản phải trả, tín dụng và lợi nhuận giữ lại.</p><p><strong>Chương 4: Kế toán dồn tích và kế toán tiền mặt.</strong> Giới thiệu 2 phương pháp kế toán thông dụng và 1 phương pháp kế toán sáng tạo. Chương này cũng trả lời câu hỏi: Nên hạch toán chi phí doanh nghiệp như thế nào?</p><p><strong>Chương 5: Báo cáo tài chính cho công ty dịch vụ.</strong> Công ty dịch vụ khác công ty sản xuất và bán hàng ở chỗ không có hàng tồn kho. Vậy chúng ta cần lưu ý gì khi lập báo cáo tài chính cho các công ty dịch vụ? Nếu công ty của bạn vừa bán hàng, vừa cung cấp dịch vụ (ví dụ như bán khóa học, tư vấn kinh doanh,) thì phải hạch toán thế nào?</p><p><strong>Chương 6: Định giá hàng tồn kho.</strong> Định giá hàng tồn kho là một nghệ thuật. Chương này giúp bạn phân biệt hai phương pháp định giá tồn kho FIFO và LIFO. Ưu và nhược của mỗi loại là gì?</p><p><strong>Chương 7 Báo cáo lưu chuyển tiền tệ.</strong> Doanh thu và lợi nhuận không giúp gì được cho việc kinh doanh, nếu bạn không nắm rõ dòng tiền của mình. Chương này giới thiệu cách lập báo cáo lưu chuyển tiền tệ, giúp bạn theo dõi tiền của mình đi đâu và về đâu!</p><p><strong>Chương 8: Vì sao bạn có doanh thu, lợi nhuận nhưng không có tiền mặt?</strong> Đôi khi bạn cảm thấy mình đang kinh doanh có lời. Hàng nhập về đã bán hết, khách hàng đông đảo, nhưng két tiền lại rỗng không? Thế thì, tiền của bạn đi đâu? Câu trả lời sẽ có trong chương 8.</p><p><strong>Chương 9: Kế toán thuế và thanh lý.</strong> Sau một thời gian kinh doanh, bạn quyết định tạm dừng, để tập trung cho một hoạt động mới. Vậy bạn cần thanh lý doanh nghiệp của mình như thế nào? Cách tính thuế và lợi nhuận ròng sau thuế ra sao. Làm thế nào để bán, chuyển nhượng và thanh lý doanh nghiệp có lợi nhất cho bạn?</p><p><strong>Chương 10 Phân tích tài chính, cải thiện lợi nhuận.</strong> Làm được việc gì đó là một chuyện. Hiểu và rút ra những bài học trong quá trình đó lại là, một chuyện khác. Chương này giúp bạn nhìn lại toàn bộ quá trình kinh doanh của mình. Đánh giá sức khỏe tài chính doanh nghiệp thông qua các con số trên Báo cáo tài chính. Sau đó, bạn sẽ biết mình cần làm gì để doanh nghiệp phát triển hơn.</p><p><br>#taichinh #ketoan #baocaotaichinh #kinhdoanh #khoinghiep</p><p>&nbsp;</p><p>&nbsp;</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', '2023-12-05', '2023-12-05', 58, 'Tr?n Thanh Phong', 0, 0, 0, 0, NULL, '30x30cm', 'Nhà Xuất Bản Thế Giới', 1, 268, NULL),
(1593, 'Kế Toán Vỉa Hè - Thực Hành Báo Cáo Tài Chính', '../../../lib/imgs/db4f09b6ee8bc317f097ebcca1933a2d.png.webp', 160000, 0, 0, NULL, 1000, 58, '', '<h2><strong>BIẾN KẾ TOÁN KHÔ KHAN TRỞ THÀNH TRÒ CHƠI CON TRẺ, DỄ HIỂU VÀ DỄ ÁP DỤNG</strong></h2><p>Đã bao lần bạn cầm trên tay bảng báo cáo tài chính doanh nghiệp của mình, nhưng chẳng thể nào hiểu nổi?&nbsp;</p><p>Kế toán và tài chính là nỗi đau chung của rất nhiều doanh nghiệp nhỏ. Ngôn ngữ tài chính dường như là điều bí ẩn nhất của thế giới. Vô số tính toán và ý đồ được cài cắm sau các con số, mà thậm chí người kinh doanh nhiều năm cũng không thể nào bóc tách nổi.<br>Nếu bạn vẫn cảm thấy mù mờ với bảng báo cáo tài chính của mình thì thật là đáng tiếc. Tài chính được xem như là ngôn ngữ của kinh doanh. Bảng kế toán sẽ cho bạn biết được doanh nghiệp của mình lời hay lỗ, trả lời câu hỏi vì sao trông bạn có vẻ đang ăn nên làm ra, nhưng két sắt công ty không có lấy một đồng.</p><p><strong>Quyển sách mang đến cho bạn:</strong></p><ul><li>Kiến thức căn bản về kế toán doanh nghiệp.</li><li>Phân biệt 3 loại báo cáo tài chính quan trọng nhất.</li><li>Phân tích chức năng của mỗi loại báo cáo trong quản trị doanh nghiệp.</li><li>Hiểu và tự lập được bảng cân đối kế toán, báo cáo kết quả kinh doanh, báo cáo luân chuyển tiền tệ.</li><li>Đánh giá sơ bộ được sức khỏe tài chính của doanh nghiệp thông qua 3 báo cáo tài chính trên.</li></ul><p><strong>Bạn càng am hiểu sớm kế toán và báo cáo tài chính, càng có lợi cho công việc kinh doanh lâu dài.</strong></p><h3>&nbsp;</h3><h3><strong>VỀ TÁC GIẢ</strong></h3><p><strong><img src=\"https://salt.tikicdn.com/ts/tmp/0f/04/28/ab2219357d5378d064f761f4a7e74e4b.jpg\" alt=\"\"></strong></p><h3><strong>VỀ DỊCH GIẢ</strong></h3><p><img src=\"https://salt.tikicdn.com/ts/tmp/9b/87/44/a701c5040c7b521e8e2f786661db6e68.png\" alt=\"\"></p><p>TRẦN THANH PHONG</p><p>Trần Thanh Phong là tác giả, chủ doanh nghiệp và vận động viên ba môn phối hợp Ironman. Anh được mọi người nhắc đến như là, tác giả Việt đầu tiên viết về chủ đề Khởi nghiệp kinh doanh thực chiến. Tác phẩm tiêu biểu:</p><ul><li>Khởi nghiệp bán lẻ.</li><li>Khởi nghiệp du kích.</li><li>Đừng để mất bò.</li><li>Trên lưng khổng tượng.</li></ul><p>Không phải học giả hay diễn giả, anh là người làm nghề thực thụ. Sau 15 năm khởi nghiệp, quản lý nhiều công việc kinh doanh, từ bán lẻ đến thương mại điện tử, anh đã đúc kết nhiều kinh nghiệm thực tế và gói gọn chúng trong những cuốn sách của mình.</p><h3><strong>TÓM TẮT SÁCH</strong></h3><p>Cuốn sách chia làm 10 chương:</p><p><strong>Chương 1: Bảng cân đối kế toán. </strong>Giới thiệu về bảng cân đối kế toán. Chi phí khác gì với chi phí sản xuất? Giá vốn hàng bán và giá thành có giống nhau không?</p><p><strong>Chương 2: Báo cáo kết quả hoạt động kinh doanh.</strong> Giới thiệu về báo cáo kết quả hoạt động kinh doanh, lợi nhuận gộp, lợi nhuận ròng, thu nhập và dòng tiền. Làm sao để nhận ra, tình hình kinh doanh của bạn đang tốt lên hay xấu đi?</p><p><strong>Chương 3: Kế toán nợ phải trả.</strong> Vay vốn là hoạt động cần thiết để kinh doanh. Chương này giúp bạn hiểu cách theo dõi các khoản vay, khoản phải trả, tín dụng và lợi nhuận giữ lại.</p><p><strong>Chương 4: Kế toán dồn tích và kế toán tiền mặt.</strong> Giới thiệu 2 phương pháp kế toán thông dụng và 1 phương pháp kế toán sáng tạo. Chương này cũng trả lời câu hỏi: Nên hạch toán chi phí doanh nghiệp như thế nào?</p><p><strong>Chương 5: Báo cáo tài chính cho công ty dịch vụ.</strong> Công ty dịch vụ khác công ty sản xuất và bán hàng ở chỗ không có hàng tồn kho. Vậy chúng ta cần lưu ý gì khi lập báo cáo tài chính cho các công ty dịch vụ? Nếu công ty của bạn vừa bán hàng, vừa cung cấp dịch vụ (ví dụ như bán khóa học, tư vấn kinh doanh,) thì phải hạch toán thế nào?</p><p><strong>Chương 6: Định giá hàng tồn kho.</strong> Định giá hàng tồn kho là một nghệ thuật. Chương này giúp bạn phân biệt hai phương pháp định giá tồn kho FIFO và LIFO. Ưu và nhược của mỗi loại là gì?</p><p><strong>Chương 7 Báo cáo lưu chuyển tiền tệ.</strong> Doanh thu và lợi nhuận không giúp gì được cho việc kinh doanh, nếu bạn không nắm rõ dòng tiền của mình. Chương này giới thiệu cách lập báo cáo lưu chuyển tiền tệ, giúp bạn theo dõi tiền của mình đi đâu và về đâu!</p><p><strong>Chương 8: Vì sao bạn có doanh thu, lợi nhuận nhưng không có tiền mặt?</strong> Đôi khi bạn cảm thấy mình đang kinh doanh có lời. Hàng nhập về đã bán hết, khách hàng đông đảo, nhưng két tiền lại rỗng không? Thế thì, tiền của bạn đi đâu? Câu trả lời sẽ có trong chương 8.</p><p><strong>Chương 9: Kế toán thuế và thanh lý.</strong> Sau một thời gian kinh doanh, bạn quyết định tạm dừng, để tập trung cho một hoạt động mới. Vậy bạn cần thanh lý doanh nghiệp của mình như thế nào? Cách tính thuế và lợi nhuận ròng sau thuế ra sao. Làm thế nào để bán, chuyển nhượng và thanh lý doanh nghiệp có lợi nhất cho bạn?</p><p><strong>Chương 10 Phân tích tài chính, cải thiện lợi nhuận.</strong> Làm được việc gì đó là một chuyện. Hiểu và rút ra những bài học trong quá trình đó lại là, một chuyện khác. Chương này giúp bạn nhìn lại toàn bộ quá trình kinh doanh của mình. Đánh giá sức khỏe tài chính doanh nghiệp thông qua các con số trên Báo cáo tài chính. Sau đó, bạn sẽ biết mình cần làm gì để doanh nghiệp phát triển hơn.</p><p><br>#taichinh #ketoan #baocaotaichinh #kinhdoanh #khoinghiep</p><p>&nbsp;</p><p>&nbsp;</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', '2023-12-05', '2023-12-07', 57, 'AAAA', 0, 0, 0, 0, NULL, '30x30cm', 'Nhà Xuất Bản Thế Giới', 1, 268, NULL),
(1594, 'Kế Toán Vỉa Hè - Thực Hành Báo Cáo Tài Chính Căn Bản', '../../../lib/imgs/db4f09b6ee8bc317f097ebcca1933a2d.png.webp', 160000, 0, 1, NULL, 1000, 58, '', '<h2><strong>BIẾN KẾ TOÁN KHÔ KHAN TRỞ THÀNH TRÒ CHƠI CON TRẺ, DỄ HIỂU VÀ DỄ ÁP DỤNG</strong></h2><p>Đã bao lần bạn cầm trên tay bảng báo cáo tài chính doanh nghiệp của mình, nhưng chẳng thể nào hiểu nổi?&nbsp;</p><p>Kế toán và tài chính là nỗi đau chung của rất nhiều doanh nghiệp nhỏ. Ngôn ngữ tài chính dường như là điều bí ẩn nhất của thế giới. Vô số tính toán và ý đồ được cài cắm sau các con số, mà thậm chí người kinh doanh nhiều năm cũng không thể nào bóc tách nổi.<br>Nếu bạn vẫn cảm thấy mù mờ với bảng báo cáo tài chính của mình thì thật là đáng tiếc. Tài chính được xem như là ngôn ngữ của kinh doanh. Bảng kế toán sẽ cho bạn biết được doanh nghiệp của mình lời hay lỗ, trả lời câu hỏi vì sao trông bạn có vẻ đang ăn nên làm ra, nhưng két sắt công ty không có lấy một đồng.</p><p><strong>Quyển sách mang đến cho bạn:</strong></p><ul><li>Kiến thức căn bản về kế toán doanh nghiệp.</li><li>Phân biệt 3 loại báo cáo tài chính quan trọng nhất.</li><li>Phân tích chức năng của mỗi loại báo cáo trong quản trị doanh nghiệp.</li><li>Hiểu và tự lập được bảng cân đối kế toán, báo cáo kết quả kinh doanh, báo cáo luân chuyển tiền tệ.</li><li>Đánh giá sơ bộ được sức khỏe tài chính của doanh nghiệp thông qua 3 báo cáo tài chính trên.</li></ul><p><strong>Bạn càng am hiểu sớm kế toán và báo cáo tài chính, càng có lợi cho công việc kinh doanh lâu dài.</strong></p><h3>&nbsp;</h3><h3><strong>VỀ TÁC GIẢ</strong></h3><p><strong><img src=\"https://salt.tikicdn.com/ts/tmp/0f/04/28/ab2219357d5378d064f761f4a7e74e4b.jpg\" alt=\"\"></strong></p><h3><strong>VỀ DỊCH GIẢ</strong></h3><p><img src=\"https://salt.tikicdn.com/ts/tmp/9b/87/44/a701c5040c7b521e8e2f786661db6e68.png\" alt=\"\"></p><p>TRẦN THANH PHONG</p><p>Trần Thanh Phong là tác giả, chủ doanh nghiệp và vận động viên ba môn phối hợp Ironman. Anh được mọi người nhắc đến như là, tác giả Việt đầu tiên viết về chủ đề Khởi nghiệp kinh doanh thực chiến. Tác phẩm tiêu biểu:</p><ul><li>Khởi nghiệp bán lẻ.</li><li>Khởi nghiệp du kích.</li><li>Đừng để mất bò.</li><li>Trên lưng khổng tượng.</li></ul><p>Không phải học giả hay diễn giả, anh là người làm nghề thực thụ. Sau 15 năm khởi nghiệp, quản lý nhiều công việc kinh doanh, từ bán lẻ đến thương mại điện tử, anh đã đúc kết nhiều kinh nghiệm thực tế và gói gọn chúng trong những cuốn sách của mình.</p><h3><strong>TÓM TẮT SÁCH</strong></h3><p>Cuốn sách chia làm 10 chương:</p><p><strong>Chương 1: Bảng cân đối kế toán. </strong>Giới thiệu về bảng cân đối kế toán. Chi phí khác gì với chi phí sản xuất? Giá vốn hàng bán và giá thành có giống nhau không?</p><p><strong>Chương 2: Báo cáo kết quả hoạt động kinh doanh.</strong> Giới thiệu về báo cáo kết quả hoạt động kinh doanh, lợi nhuận gộp, lợi nhuận ròng, thu nhập và dòng tiền. Làm sao để nhận ra, tình hình kinh doanh của bạn đang tốt lên hay xấu đi?</p><p><strong>Chương 3: Kế toán nợ phải trả.</strong> Vay vốn là hoạt động cần thiết để kinh doanh. Chương này giúp bạn hiểu cách theo dõi các khoản vay, khoản phải trả, tín dụng và lợi nhuận giữ lại.</p><p><strong>Chương 4: Kế toán dồn tích và kế toán tiền mặt.</strong> Giới thiệu 2 phương pháp kế toán thông dụng và 1 phương pháp kế toán sáng tạo. Chương này cũng trả lời câu hỏi: Nên hạch toán chi phí doanh nghiệp như thế nào?</p><p><strong>Chương 5: Báo cáo tài chính cho công ty dịch vụ.</strong> Công ty dịch vụ khác công ty sản xuất và bán hàng ở chỗ không có hàng tồn kho. Vậy chúng ta cần lưu ý gì khi lập báo cáo tài chính cho các công ty dịch vụ? Nếu công ty của bạn vừa bán hàng, vừa cung cấp dịch vụ (ví dụ như bán khóa học, tư vấn kinh doanh,) thì phải hạch toán thế nào?</p><p><strong>Chương 6: Định giá hàng tồn kho.</strong> Định giá hàng tồn kho là một nghệ thuật. Chương này giúp bạn phân biệt hai phương pháp định giá tồn kho FIFO và LIFO. Ưu và nhược của mỗi loại là gì?</p><p><strong>Chương 7 Báo cáo lưu chuyển tiền tệ.</strong> Doanh thu và lợi nhuận không giúp gì được cho việc kinh doanh, nếu bạn không nắm rõ dòng tiền của mình. Chương này giới thiệu cách lập báo cáo lưu chuyển tiền tệ, giúp bạn theo dõi tiền của mình đi đâu và về đâu!</p><p><strong>Chương 8: Vì sao bạn có doanh thu, lợi nhuận nhưng không có tiền mặt?</strong> Đôi khi bạn cảm thấy mình đang kinh doanh có lời. Hàng nhập về đã bán hết, khách hàng đông đảo, nhưng két tiền lại rỗng không? Thế thì, tiền của bạn đi đâu? Câu trả lời sẽ có trong chương 8.</p><p><strong>Chương 9: Kế toán thuế và thanh lý.</strong> Sau một thời gian kinh doanh, bạn quyết định tạm dừng, để tập trung cho một hoạt động mới. Vậy bạn cần thanh lý doanh nghiệp của mình như thế nào? Cách tính thuế và lợi nhuận ròng sau thuế ra sao. Làm thế nào để bán, chuyển nhượng và thanh lý doanh nghiệp có lợi nhất cho bạn?</p><p><strong>Chương 10 Phân tích tài chính, cải thiện lợi nhuận.</strong> Làm được việc gì đó là một chuyện. Hiểu và rút ra những bài học trong quá trình đó lại là, một chuyện khác. Chương này giúp bạn nhìn lại toàn bộ quá trình kinh doanh của mình. Đánh giá sức khỏe tài chính doanh nghiệp thông qua các con số trên Báo cáo tài chính. Sau đó, bạn sẽ biết mình cần làm gì để doanh nghiệp phát triển hơn.</p><p><br>#taichinh #ketoan #baocaotaichinh #kinhdoanh #khoinghiep</p><p>&nbsp;</p><p>&nbsp;</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', '2023-12-05', '2023-12-22', 58, 'Tr?n Thanh Phong', 0, 0, 0, 0, NULL, '30x30cm', 'Nhà Xuất Bản Thế Giới', 1, 268, NULL),
(1596, 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', '../../../lib/imgs/db4f09b6ee8bc317f097ebcca1933a2d.png', 160000, 0, 0, NULL, 1000, 58, '', '<h2><strong>BIẾN KẾ TOÁN KHÔ KHAN TRỞ THÀNH TRÒ CHƠI CON TRẺ, DỄ HIỂU VÀ DỄ ÁP DỤNG</strong></h2><p>Đã bao lần bạn cầm trên tay bảng báo cáo tài chính doanh nghiệp của mình, nhưng chẳng thể nào hiểu nổi?&nbsp;</p><p>Kế toán và tài chính là nỗi đau chung của rất nhiều doanh nghiệp nhỏ. Ngôn ngữ tài chính dường như là điều bí ẩn nhất của thế giới. Vô số tính toán và ý đồ được cài cắm sau các con số, mà thậm chí người kinh doanh nhiều năm cũng không thể nào bóc tách nổi.<br>Nếu bạn vẫn cảm thấy mù mờ với bảng báo cáo tài chính của mình thì thật là đáng tiếc. Tài chính được xem như là ngôn ngữ của kinh doanh. Bảng kế toán sẽ cho bạn biết được doanh nghiệp của mình lời hay lỗ, trả lời câu hỏi vì sao trông bạn có vẻ đang ăn nên làm ra, nhưng két sắt công ty không có lấy một đồng.</p><p><strong>Quyển sách mang đến cho bạn:</strong></p><ul><li>Kiến thức căn bản về kế toán doanh nghiệp.</li><li>Phân biệt 3 loại báo cáo tài chính quan trọng nhất.</li><li>Phân tích chức năng của mỗi loại báo cáo trong quản trị doanh nghiệp.</li><li>Hiểu và tự lập được bảng cân đối kế toán, báo cáo kết quả kinh doanh, báo cáo luân chuyển tiền tệ.</li><li>Đánh giá sơ bộ được sức khỏe tài chính của doanh nghiệp thông qua 3 báo cáo tài chính trên.</li></ul><p><strong>Bạn càng am hiểu sớm kế toán và báo cáo tài chính, càng có lợi cho công việc kinh doanh lâu dài.</strong></p><h3>&nbsp;</h3><h3><strong>VỀ TÁC GIẢ</strong></h3><figure class=\"image\"><img src=\"../../../lib/imgs/ab2219357d5378d064f761f4a7e74e4b.jpg\"></figure><h3><strong>VỀ DỊCH GIẢ</strong></h3><figure class=\"image\"><img src=\"../../../lib/imgs/a701c5040c7b521e8e2f786661db6e68.png\"></figure><p>TRẦN THANH PHONG</p><p>Trần Thanh Phong là tác giả, chủ doanh nghiệp và vận động viên ba môn phối hợp Ironman. Anh được mọi người nhắc đến như là, tác giả Việt đầu tiên viết về chủ đề Khởi nghiệp kinh doanh thực chiến. Tác phẩm tiêu biểu:</p><ul><li>Khởi nghiệp bán lẻ.</li><li>Khởi nghiệp du kích.</li><li>Đừng để mất bò.</li><li>Trên lưng khổng tượng.</li></ul><p>Không phải học giả hay diễn giả, anh là người làm nghề thực thụ. Sau 15 năm khởi nghiệp, quản lý nhiều công việc kinh doanh, từ bán lẻ đến thương mại điện tử, anh đã đúc kết nhiều kinh nghiệm thực tế và gói gọn chúng trong những cuốn sách của mình.</p><h3><strong>TÓM TẮT SÁCH</strong></h3><p>Cuốn sách chia làm 10 chương:</p><p><strong>Chương 1: Bảng cân đối kế toán. </strong>Giới thiệu về bảng cân đối kế toán. Chi phí khác gì với chi phí sản xuất? Giá vốn hàng bán và giá thành có giống nhau không?</p><p><strong>Chương 2: Báo cáo kết quả hoạt động kinh doanh.</strong> Giới thiệu về báo cáo kết quả hoạt động kinh doanh, lợi nhuận gộp, lợi nhuận ròng, thu nhập và dòng tiền. Làm sao để nhận ra, tình hình kinh doanh của bạn đang tốt lên hay xấu đi?</p><p><strong>Chương 3: Kế toán nợ phải trả.</strong> Vay vốn là hoạt động cần thiết để kinh doanh. Chương này giúp bạn hiểu cách theo dõi các khoản vay, khoản phải trả, tín dụng và lợi nhuận giữ lại.</p><p><strong>Chương 4: Kế toán dồn tích và kế toán tiền mặt.</strong> Giới thiệu 2 phương pháp kế toán thông dụng và 1 phương pháp kế toán sáng tạo. Chương này cũng trả lời câu hỏi: Nên hạch toán chi phí doanh nghiệp như thế nào?</p><p><strong>Chương 5: Báo cáo tài chính cho công ty dịch vụ.</strong> Công ty dịch vụ khác công ty sản xuất và bán hàng ở chỗ không có hàng tồn kho. Vậy chúng ta cần lưu ý gì khi lập báo cáo tài chính cho các công ty dịch vụ? Nếu công ty của bạn vừa bán hàng, vừa cung cấp dịch vụ (ví dụ như bán khóa học, tư vấn kinh doanh,) thì phải hạch toán thế nào?</p><p><strong>Chương 6: Định giá hàng tồn kho.</strong> Định giá hàng tồn kho là một nghệ thuật. Chương này giúp bạn phân biệt hai phương pháp định giá tồn kho FIFO và LIFO. Ưu và nhược của mỗi loại là gì?</p><p><strong>Chương 7 Báo cáo lưu chuyển tiền tệ.</strong> Doanh thu và lợi nhuận không giúp gì được cho việc kinh doanh, nếu bạn không nắm rõ dòng tiền của mình. Chương này giới thiệu cách lập báo cáo lưu chuyển tiền tệ, giúp bạn theo dõi tiền của mình đi đâu và về đâu!</p><p><strong>Chương 8: Vì sao bạn có doanh thu, lợi nhuận nhưng không có tiền mặt?</strong> Đôi khi bạn cảm thấy mình đang kinh doanh có lời. Hàng nhập về đã bán hết, khách hàng đông đảo, nhưng két tiền lại rỗng không? Thế thì, tiền của bạn đi đâu? Câu trả lời sẽ có trong chương 8.</p><p><strong>Chương 9: Kế toán thuế và thanh lý.</strong> Sau một thời gian kinh doanh, bạn quyết định tạm dừng, để tập trung cho một hoạt động mới. Vậy bạn cần thanh lý doanh nghiệp của mình như thế nào? Cách tính thuế và lợi nhuận ròng sau thuế ra sao. Làm thế nào để bán, chuyển nhượng và thanh lý doanh nghiệp có lợi nhất cho bạn?</p><p><strong>Chương 10 Phân tích tài chính, cải thiện lợi nhuận.</strong> Làm được việc gì đó là một chuyện. Hiểu và rút ra những bài học trong quá trình đó lại là, một chuyện khác. Chương này giúp bạn nhìn lại toàn bộ quá trình kinh doanh của mình. Đánh giá sức khỏe tài chính doanh nghiệp thông qua các con số trên Báo cáo tài chính. Sau đó, bạn sẽ biết mình cần làm gì để doanh nghiệp phát triển hơn.</p><p><br>#taichinh #ketoan #baocaotaichinh #kinhdoanh #khoinghiep</p><p>&nbsp;</p><p>&nbsp;</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', '2023-12-05', '2023-12-31', 60, 'Trần Thanh Phong', 0, 0, 0, 0, 0, '30x30cm', 'Nhà Xuất Bản Thế Giới', 1, 268, 'Trần Thanh Phong'),
(1597, 'Cây Cam Ngọt Của Tôi', '../../../lib/imgs/2a6154ba08df6ce6161c13f4303fa19e.jpg.webp', 71000, 0, 0, NULL, 1000, 58, '', '<p>“Vị chua chát của cái nghèo hòa trộn với vị ngọt ngào khi khám phá ra những điều khiến cuộc đời này đáng số một tác phẩm kinh điển của Brazil.”</p><p>- Booklist</p><p>“Một cách nhìn cuộc sống gần như hoàn chỉnh từ con mắt trẻ thơ… có sức mạnh sưởi ấm và làm tan nát cõi lòng, dù người đọc ở lứa tuổi nào.”</p><figure class=\"image\"><img src=\"../../../lib/imgs/2a6154ba08df6ce6161c13f4303fa19e.jpg.webp\"></figure><p>- The National</p><p>Hãy làm quen với Zezé, cậu bé tinh nghịch siêu hạng đồng thời cũng đáng yêu bậc nhất, với ước mơ lớn lên trở thành nhà thơ cổ thắt nơ bướm. Chẳng phải ai cũng công nhận khoản “đáng yêu” kia đâu nhé. Bởi vì, ở cái xóm ngoại ô nghèo ấy, nỗi khắc khổ bủa vây đã che mờ mắt người ta trước trái tim thiện lương cùng trí tưởng tượng tuyệt vời của cậu bé con năm tuổi.</p><p>Có hề gì đâu bao nhiêu là hắt hủi, đánh mắng, vì Zezé đã có một người bạn đặc biệt để trút nỗi lòng: cây cam ngọt nơi vườn sau. Và cả một người bạn nữa, bằng xương bằng thịt, một ngày kia xuất hiện, cho cậu bé nhạy cảm khôn sớm biết thế nào là trìu mến, thế nào là nỗi đau, và mãi mãi thay đổi cuộc đời cậu.<br>Mở đầu bằng những thanh âm trong sáng và kết thúc lắng lại trong những nốt trầm hoài niệm, Cây cam ngọt của tôi khiến ta nhận ra vẻ đẹp thực sự của cuộc sống đến từ những điều giản dị như bông hoa trắng của cái cây sau nhà, và rằng cuộc đời thật khốn khổ nếu thiếu đi lòng yêu thương và niềm trắc ẩn. Cuốn sách kinh điển này bởi thế không ngừng khiến trái tim người đọc khắp thế giới thổn thức, kể từ khi ra mắt lần đầu năm 1968 tại Brazil.</p><p><strong>Tác giả:</strong></p><p>JOSÉ MAURO DE VASCONCELOS (1920-1984) là nhà văn người Brazil. Sinh ra trong một gia đình nghèo ở ngoại ô Rio de Janeiro, lớn lên ông phải làm đủ nghề để kiếm sống. Nhưng với tài kể chuyện thiên bẩm, trí nhớ phi thường, trí tưởng tượng tuyệt vời cùng vốn sống phong phú, José cảm thấy trong mình thôi thúc phải trở thành nhà văn nên đã bắt đầu sáng tác năm 22 tuổi. Tác phẩm nổi tiếng nhất của ông là tiểu thuyết mang màu sắc tự truyện Cây cam ngọt của tôi. Cuốn sách được đưa vào chương trình tiểu học của Brazil, được bán bản quyền cho hai mươi quốc gia và chuyển thể thành phim điện ảnh. Ngoài ra, José còn rất thành công trong vai trò diễn viên điện ảnh và biên kịch.</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', '2023-12-05', '2023-12-31', 58, 'José Mauro de Vasconcelos', 0, 0, 0, 0, 0, ' 14 x 20.5 cm', ' Nhà Xuất Bản Hội Nhà Văn', 1, 244, ''),
(1598, 'Nhà Giả Kim', '../../../lib/imgs/aa81d0a534b45706ae1eee1e344e80d9.jpg.webp', 47700, 0, 0, NULL, 1000, 55, '', '<p><strong>Sơ lược về tác phẩm</strong></p><p>Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.</p><p>Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.</p><p>“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”</p><p>- Trích Nhà giả kim</p><p><strong>Nhận định</strong></p><p>“Sau Garcia Márquez, đây là nhà văn Mỹ Latinh được đọc nhiều nhất thế giới.”</p><p>- The Economist, London, Anh</p><p>“Santiago có khả năng cảm nhận bằng trái tim như Hoàng tử bé của Saint-Exupéry.”</p><p>- Frankfurter Allgemeine Zeitung, Đức</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', '2023-12-22', '2023-12-22', 1, 'Paulo Coelho', 0, 0, 0, 0, 0, ' 14 x 20.5 cm', ' Nhã Nam', 1, 228, 'Paulo Coelho'),
(1599, 'Sách mới', '../../../lib/imgs/4.jpg', 160000, 0, 0, NULL, 1000, 55, '', '<p>Đang cập nhật</p>', '2023-12-31', '2023-12-31', 1, 'Trần Thanh Phong', 0, 0, 0, 0, NULL, '30x30cm', 'Nhà Xuất Bản Thế Giới', 0, 123, 'Trần Thanh Phong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcart`
--

CREATE TABLE `tblcart` (
  `cart_id` int(5) NOT NULL,
  `cart_user_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `cart_adderss` varchar(200) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `cart_book_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `cart_book_price` int(10) DEFAULT NULL,
  `cart_book_total` int(3) DEFAULT NULL,
  `cart_creat_date` varchar(20) DEFAULT NULL,
  `cart_last_modifle` varchar(20) DEFAULT NULL,
  `cart_status` tinyint(1) DEFAULT 0,
  `cart_note` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `cart_user_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcart`
--

INSERT INTO `tblcart` (`cart_id`, `cart_user_name`, `cart_adderss`, `cart_book_name`, `cart_book_price`, `cart_book_total`, `cart_creat_date`, `cart_last_modifle`, `cart_status`, `cart_note`, `cart_user_phone`) VALUES
(1, 'Trần Thanh Phong', 'TT Chờ, Yên Phong, Bắc Ninh', 'Đàn ông sao hỏa đàn bà sao kim', 72000, 5, '2023-12-21', '2023-12-21', 1, 'Đàn ông sao hỏa đàn bà sao kim Đàn ông sao hỏa đàn bà sao kim\r\nĐàn ông sao hỏa đàn bà sao kim\r\nĐàn ông sao hỏa đàn bà sao kim', '09876868889'),
(2, 'Trần Thanh Phong', 'TT Chờ, Yên Phong, Bắc Ninh', 'Đàn ông sao hỏa đàn bà sao kim', 72000, 5, '2023-12-21', '2023-12-21', 1, 'Đàn ông sao hỏa đàn bà sao kim Đàn ông sao hỏa đàn bà sao kim\r\nĐàn ông sao hỏa đàn bà sao kim\r\nĐàn ông sao hỏa đàn bà sao kim', '09876868889'),
(3, 'Nghiêm Đình Quý', 'TT Chờ, Yên Phong, Bắc Ninh', 'Đàn ông sao hỏa đàn bà sao kim', 72000, 5, '2023-12-21', '2023-12-21', 1, 'Đàn ông sao hỏa đàn bà sao kim Đàn ông sao hỏa đàn bà sao kim\r\nĐàn ông sao hỏa đàn bà sao kim\r\nĐàn ông sao hỏa đàn bà sao kim', '09876868889'),
(6, 'Linh Linh', 'TT Chờ, Yên Phong, Bắc Ninh', 'Cây cam ngọt của tôi', 72000, 4, '2023-12-21', '2023-12-21', 0, 'Cây cam ngọt của tôi', '0987686888'),
(7, 'Linh Linh', 'TT Chờ, Yên Phong, Bắc Ninh', 'Cây cam ngọt của tôi', 70000, 2, '2023-12-21', '2023-12-21', 1, 'TT Chờ, Yên Phong, Bắc Ninh', '0987686888'),
(8, 'Lan Lan', 'TT Chờ, Yên Phong, Bắc Ninh', 'abcs', 72000, 5, '2023-12-22', '2023-12-22', 1, '', '0987563244'),
(10, 'Đình Đình', 'Bắc Ninh', 'Sách mới', 160000, 1, '2024-01-01', '2024-01-01', 0, '', '09856312'),
(11, 'Đình Đình', 'Bắc Ninh', 'Sách mới', 160000, 2, '2024-01-01', '2024-01-01', 0, '', '09856312'),
(12, 'Đình Đình', 'Bắc Ninh', 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 160000, 3, '2024-01-01', '2024-01-01', 0, '', '09856312'),
(13, 'admin', 'Bắc Ninh', 'Cây Cam Ngọt Của Tôi', 71000, 1, '2024-01-01', '2024-01-01', 0, '', '999999999999'),
(14, 'a', 'a', 'Cây Cam Ngọt Của Tôi', 71000, 1, '2024-01-01', '2024-01-01', 0, '', 'a'),
(15, 'a', 'a', 'Cây Cam Ngọt Của Tôi', 71000, 1, '2024-01-01', '2024-01-01', 0, '', 'a'),
(16, 's', 's', 'Cây Cam Ngọt Của Tôi', 71000, 1, '2024-01-01', '2024-01-01', 0, '', 's'),
(17, 'a', 'a', 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 160000, 3, '2024-01-01', '2024-01-01', 0, '', 'a'),
(18, 'c', 'c', 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 160000, 1, '2024-01-01', '2024-01-01', 0, '', 'c'),
(19, 'c', 'c', 'Nhà Giả Kim', 47700, 2, '2024-01-01', '2024-01-01', 0, '', 'c'),
(20, 'z', 'z', 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 160000, 1, '2024-01-01', '2024-01-01', 0, '', 'z'),
(21, 'z', 'z', 'Nhà Giả Kim', 47700, 1, '2024-01-01', '2024-01-01', 0, '', 'z'),
(22, 'ư', 'ư', 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 160000, 1, '2024-01-01', '2024-01-01', 0, '', 'ư'),
(23, 'ư', 'ư', 'Nhà Giả Kim', 47700, 3, '2024-01-01', '2024-01-01', 0, '', 'ư'),
(24, 'q', 'q', 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 160000, 3, '2024-01-01', '2024-01-01', 0, '', 'q'),
(25, 'q', 'q', 'Nhà Giả Kim', 47700, 3, '2024-01-01', '2024-01-01', 0, '', 'q'),
(26, 'y', 'y', 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 160000, 1, '2024-01-01', '2024-01-01', 0, '', 'y'),
(27, 'y', 'y', 'Nhà Giả Kim', 47700, 4, '2024-01-01', '2024-01-01', 0, '', 'y'),
(28, 'aa', 'aa', 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 160000, 1, '2024-01-01', '2024-01-01', 0, '', 'aa'),
(30, 'Linh Linh', 'aaaa', 'Cây cam ngọt của tôi', 72000, 5, '2024-01-01', '2024-01-01', 0, '', '09876868889');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcategory`
--

CREATE TABLE `tblcategory` (
  `category_id` smallint(5) UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_notes` text DEFAULT NULL,
  `category_created_date` varchar(50) DEFAULT NULL,
  `category_created_author_id` int(10) UNSIGNED DEFAULT NULL,
  `category_last_modified` varchar(50) DEFAULT NULL,
  `category_manager_id` int(10) UNSIGNED DEFAULT NULL,
  `category_enable` tinyint(1) DEFAULT NULL,
  `category_delete` tinyint(1) DEFAULT 0,
  `category_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcategory`
--

INSERT INTO `tblcategory` (`category_id`, `category_name`, `category_notes`, `category_created_date`, `category_created_author_id`, `category_last_modified`, `category_manager_id`, `category_enable`, `category_delete`, `category_image`) VALUES
(1, 'Thiếu nhi', 'Sách dành cho thiếu nhi', '', 0, '2023-11-29', 58, NULL, 0, ''),
(58, 'Sách tiếng Việt', 'Sách tiếng Việt', '2023-11-29', 3, '2023-11-29', 58, NULL, 0, ''),
(60, 'Sách CNTT', 'abddd', '', 0, '2023-12-31', 58, NULL, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbllog`
--

CREATE TABLE `tbllog` (
  `log_id` int(10) UNSIGNED NOT NULL,
  `log_name` text NOT NULL,
  `log_user_permission` smallint(5) UNSIGNED DEFAULT NULL,
  `log_date` varchar(45) DEFAULT NULL,
  `log_user_name` varchar(200) DEFAULT NULL,
  `log_action` smallint(5) UNSIGNED DEFAULT NULL COMMENT '1. Thêm mới\r\n2. Sửa\r\n3. Xóa',
  `log_position` smallint(5) UNSIGNED DEFAULT NULL COMMENT '1. Người dùng\r\n2. Lịch\r\n3. Dịch vụ\r\n4. Khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbllog`
--

INSERT INTO `tbllog` (`log_id`, `log_name`, `log_user_permission`, `log_date`, `log_user_name`, `log_action`, `log_position`) VALUES
(1, 'Nhà Giả Kim', 4, '2023-12-18 14:20:50', 'admin', 1, 3),
(2, 'Nhà Giả Kim', 4, '2023-12-22 09:42:18', 'admin', 2, 3),
(3, 'Cây Cam Ngọt Của Tôi', 4, '2023-12-21 09:44:33', 'admin', 2, 3),
(5, 'Kế Toán Vỉa Hè - Thực Hành Báo Cáo Tài Chính Căn Bản', 4, '2023-12-22 10:01:44', 'admin', 3, 3),
(6, 'Nhà Giả Kim', 4, '2023-12-19 10:05:34', 'admin', 5, 3),
(7, 'Giao d?ch theo xu h??ng ?? ki?m s?ng', 4, '2023-12-22 10:06:05', 'admin', 4, 3),
(8, 'Sách CNTT', 4, '2023-12-20 10:10:02', 'admin', 1, 2),
(9, 'Sách CNTT', 4, '2023-12-20 10:12:11', 'admin', 1, 3),
(10, 'Sách CNTT', 4, '2023-12-20 10:18:18', 'admin', 2, 2),
(11, 'Sách CNTT', 4, '2023-12-18 10:18:26', 'admin', 3, 2),
(12, 'Truyện màu', 4, '2023-12-19 10:21:37', 'admin', 3, 2),
(13, 'Truyện màu', 4, '2023-12-22 10:22:56', 'admin', 4, 2),
(18, 'Nguyễn Công Vĩnh', 4, '2023-12-20 11:01:16', 'admin', 2, 1),
(19, 'test123', 4, '2023-12-22 11:02:19', 'admin', 1, 1),
(20, 'test123', 4, '2023-12-21 11:02:29', 'admin', 2, 1),
(24, 'test123', 4, '2023-12-22 11:04:44', 'admin', 2, 1),
(25, 'test123', 4, '2023-12-22 11:13:57', 'admin', 3, 1),
(27, 'Lan Lan', 4, '2023-12-22 18:18:49', 'admin', 7, 4),
(28, 'Lan Lan', 4, '2023-12-22 18:23:54', 'admin', 8, 4),
(29, 'Lan Lan', 4, '2023-12-22 18:24:12', 'admin', 6, 4),
(30, 'Lan Lan', 4, '2023-12-22 18:24:23', 'admin', 9, 4),
(31, 'Sách mới', 4, '2023-12-31 17:03:21', 'admin', 1, 3),
(32, '', 4, '2023-12-31 17:26:43', 'admin', 5, 2),
(33, 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 4, '2023-12-31 17:41:22', 'admin', 2, 3),
(34, 'Cây Cam Ngọt Của Tôi', 4, '2023-12-31 17:42:33', 'admin', 5, 3),
(35, 'Kế Toán Vỉa Hè-Thực Hành Báo Cáo Tài Chính Căn Bản Từ Quầy Bán Nước Chanh', 4, '2023-12-31 17:42:54', 'admin', 2, 3),
(36, 'aa', 4, '2024-01-01 14:48:59', 'admin', 6, 4),
(37, 'Linh Linh', 4, '2024-01-01 14:50:54', 'admin', 7, 4),
(38, 'aa', 4, '2024-01-01 14:52:10', 'admin', 9, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_fullname` varchar(45) DEFAULT NULL,
  `user_birthday` varchar(45) DEFAULT NULL,
  `user_phone` varchar(45) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_jobarea` varchar(500) DEFAULT NULL,
  `user_job` varchar(500) DEFAULT NULL,
  `user_position` varchar(500) DEFAULT NULL,
  `user_applyyear` varchar(200) DEFAULT NULL COMMENT 'Nam lam viec, hoac la so nam lam viec',
  `user_permission` smallint(5) UNSIGNED DEFAULT NULL,
  `user_notes` text DEFAULT NULL,
  `user_roles` varchar(200) DEFAULT NULL,
  `user_logined` smallint(5) UNSIGNED DEFAULT 0,
  `user_created_date` varchar(45) NOT NULL COMMENT 'Ngay tao',
  `user_last_modified` varchar(45) DEFAULT NULL COMMENT 'Ngay sua',
  `user_last_logined` varchar(45) DEFAULT NULL COMMENT 'Ngay dang nhap',
  `user_parent_id` int(11) NOT NULL COMMENT 'Nguoi tao ra tai khoan',
  `user_actions` tinyint(3) UNSIGNED DEFAULT 0 COMMENT 'Duoc thuc hien nhung cong viec gi (add, edit, del, comment)',
  `user_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Nếu deleted =1 là tài khoản được đánh dấu xóa - xóa tương đối. Sẽ ko xuất hiện ở danh sách bình thường'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `user_name`, `user_pass`, `user_fullname`, `user_birthday`, `user_phone`, `user_email`, `user_address`, `user_jobarea`, `user_job`, `user_position`, `user_applyyear`, `user_permission`, `user_notes`, `user_roles`, `user_logined`, `user_created_date`, `user_last_modified`, `user_last_logined`, `user_parent_id`, `user_actions`, `user_deleted`) VALUES
(1, 'super', 'e10adc3949ba59abbe56e057f20f883e', 'Super', NULL, NULL, 'super@gmail.com', NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, 101, '', NULL, NULL, 0, 0, 0),
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', NULL, NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 120, '', NULL, NULL, 0, 0, 0),
(3, 'quynd', 'e10adc3949ba59abbe56e057f20f883e', 'Nghiêm Đình Quý', NULL, NULL, 'ndq@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 61, '', NULL, NULL, 2, 0, 0),
(54, 'test', '0000', 'test', '', '', '', '', NULL, '', NULL, '', 1, '', NULL, 2, '', '2023-11-27 08:11:13', NULL, 2, 0, 0),
(55, 'test123', '0000', 'test123', '', '0988888888', 'ndq@gmail.com', 'Bắc Ninh', NULL, '', NULL, '', 2, '', NULL, 1, '', '2023-11-27 09:22:08', NULL, 2, 0, 0),
(58, 'testtesttest', 'testtesttest', 'Nghiêm Đình Quý', '', '090000000000', 'ndqhjl@gmail.com', 'Bắc Ninh', NULL, '', NULL, '', 2, '', NULL, 1, '', '2023-11-27 09:20:50', NULL, 2, 0, 0),
(62, 'anhdt', '123456', 'Đỗ Tiến Anh', '', '098711111', 'anhdt@gmail.com', 'Bắc Ninh', NULL, '', NULL, '', 1, '', NULL, 0, '', '2023-11-27 09:27:18', NULL, 2, 0, 1),
(63, 'aaaaa', 'aaaaa', 'test123', '', '0987123652', 'abc@gmail.com', 'Bắc Ninh', NULL, '', NULL, '', 1, '', NULL, 0, '', '2023-12-22 11:04:44', NULL, 2, 0, 0),
(64, 'linhlinh', '123456', 'Nguyễn Thị Linh', '', '0987029564', 'linhnt@gmail.com', 'Bắc Ninh', NULL, '', NULL, '', 1, '', NULL, 0, '2023-12-22', '2023-12-22 10:43:05', NULL, 2, 0, 0),
(65, 'test123s', '1', 'test123', '', '1234', 'test@gamil.com', 'Bắc Ninh', NULL, '', NULL, '', 1, '', NULL, 0, '2023-12-22', '2023-12-22 10:44:57', NULL, 2, 0, 0),
(66, 'vinhct', '123456', 'Nguyễn Công Vĩnh', '', '123456789', 'vinhnt@gmail.com', 'Bắc Ninh', NULL, '', NULL, '', 1, '', NULL, 1, '2023-12-22', '2023-12-22 11:01:16', NULL, 2, 0, 0),
(68, 'zzzz', '1', 'Đình Đình', NULL, '09856312', '', NULL, NULL, NULL, NULL, NULL, 1, '', NULL, 2, '', '', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`id`, `code`, `name`) VALUES
(1, 'CLASS1', 'A'),
(2, 'CLASS2', 'B'),
(3, 'CLASS3', 'C'),
(4, 'CLASS4', 'D');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`book_id`);

--
-- Chỉ mục cho bảng `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbllog`
--
ALTER TABLE `tbllog`
  ADD PRIMARY KEY (`log_id`);

--
-- Chỉ mục cho bảng `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `book_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1600;

--
-- AUTO_INCREMENT cho bảng `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `category_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `tbllog`
--
ALTER TABLE `tbllog`
  MODIFY `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
