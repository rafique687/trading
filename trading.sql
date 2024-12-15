-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 03:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trading`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` int(255) NOT NULL,
  `state` int(255) NOT NULL,
  `city` int(255) NOT NULL,
  `zipcode` int(255) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `email`, `mobile`, `status`, `first_name`, `last_name`, `address`, `country`, `state`, `city`, `zipcode`, `pic`) VALUES
(1, 'admin@gmail.com', '1234', 'khan.arbani@gmail.com', '9799184788', 0, 'Mohammad', 'rafique', 'jlk', 1, 1, 0, 342001, 'masonry-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_setting`
--

CREATE TABLE `admin_setting` (
  `id` int(225) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1 COMMENT '1active/0dactive',
  `createdate` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_setting`
--

INSERT INTO `admin_setting` (`id`, `title`, `icon`, `logo`, `active`, `createdate`, `modified`) VALUES
(1, 'iFresh', 'ifreshLogo', 'ifreshLogo.png', 1, '2020-09-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `attrib`
--

CREATE TABLE `attrib` (
  `attrid` int(155) NOT NULL,
  `parentid` int(255) NOT NULL DEFAULT 0,
  `type` int(10) NOT NULL,
  `attr_name` varchar(225) NOT NULL,
  `varriant_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attrib`
--

INSERT INTO `attrib` (`attrid`, `parentid`, `type`, `attr_name`, `varriant_name`, `status`) VALUES
(20, 0, 2, 'Size', 'xl,xxl,medium,', 0),
(21, 0, 3, 'auantitative', 'Lenght', 0),
(22, 0, 4, 'free text', 'free text', 0),
(23, 0, 1, 'single', 'single', 0),
(24, 0, 2, 'kk', 'kk,pp,', 0),
(25, 0, 2, 'lljjjj', 'kk,kk,kk,ll,', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `bannerid` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `textt` varchar(255) NOT NULL,
  `banner_section` text NOT NULL,
  `bannerstatus` int(1) NOT NULL DEFAULT 1 COMMENT '1enable,0disable',
  `bannerpic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`bannerid`, `title`, `textt`, `banner_section`, `bannerstatus`, `bannerpic`) VALUES
(9, 'QUALITY BUSINESS', 'Experience the highest level of business assistance We provide top consulting services since 2007 Experience the highest level of business assistance.', 'home', 1, 'hero-img.png'),
(10, 'About Vision And Mission', 'about', 'about', 1, 'about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_by` varchar(255) NOT NULL,
  `blog_des` text NOT NULL,
  `blog_details` text NOT NULL,
  `blog_pic` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogid`, `blog_title`, `blog_by`, `blog_des`, `blog_details`, `blog_pic`, `status`, `create_date`, `update_date`) VALUES
(0, 'first blog edrf', 'Rafique ed', 'my first blog			ed					', '<p>blosssssssssssssssss ed</p>\r\n', 'elite.png,git.PNG', 1, '2021-12-16 12:53:47', '2021-12-28 11:24:59'),
(2, 'second', 'Rafique', 'ssssss', '<p>dddddddddddd</p>\r\n', 'elite.png', 1, '2021-12-16 12:58:26', '2021-12-17 11:57:09'),
(4, 'qwrkjkj', 'req', 'eqr', '<p>rqrerwe</p>\r\n', 'Jellyfish.jpg', 1, '2021-12-28 11:24:29', '2021-12-28 11:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ctid` int(255) NOT NULL,
  `stid` int(255) NOT NULL,
  `cityname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ctid`, `stid`, `cityname`) VALUES
(1, 1, 'jodhpur'),
(2, 1, 'jaipur'),
(3, 1, 'jaisalmer'),
(4, 1, 'jalor');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `url`, `logo`, `status`) VALUES
(14, 'Mohammad Rafique', 'http://dsaf/fgdsafgl', 'clie.png', 1),
(15, 'belimo', 'http://dsaf/fgdsafgl', 'dd.png', 1),
(16, 'client3', 'http://dsaf/fgdsafglh', 'ddg.png', 1),
(17, 'client3', 'http://dsaf/fgdsafglh', 'ff.png', 1),
(18, 'cli4', 'http://dsaf/fgdsafglh', 'gg.png', 1),
(20, 'Mohammad', 'http://dsaf/fgdsafgl', 'hhggg.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contry`
--

CREATE TABLE `contry` (
  `contryid` int(255) NOT NULL,
  `contry` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contry`
--

INSERT INTO `contry` (`contryid`, `contry`) VALUES
(1, 'India'),
(2, 'Nepal'),
(3, 'bhootan'),
(4, 'america');

-- --------------------------------------------------------

--
-- Table structure for table `cutomar_details`
--

CREATE TABLE `cutomar_details` (
  `cust_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `mobilealt` varchar(255) NOT NULL,
  `countryid` int(255) NOT NULL,
  `stateid` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` int(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cutomar_details`
--

INSERT INTO `cutomar_details` (`cust_id`, `first_name`, `last_name`, `dob`, `email`, `mobile`, `mobilealt`, `countryid`, `stateid`, `city`, `zipcode`, `address`) VALUES
(17, 'mr', 'khan', '2020-09-11', 'khan.arbani@gmail.com', '9001979342', '9001979342', 1, 1, '1', 344022, 'fdsaknf fasfd		'),
(19, 'Mohammad', 'Rafique', '2020-10-12', 'info.rafique687@gmail.com', '9799184788', '9799184788', 1, 1, '1', 340022, 'asdfklanfn');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventid` int(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_photo` varchar(255) NOT NULL,
  `upload_video` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventid`, `event_name`, `description`, `event_date`, `event_photo`, `upload_video`, `video_url`, `status`) VALUES
(43, 'Anual Function', 'fdsa', '2020-11-06', 'Koala.jpg,anual.jpg,diwa.jpg,imagesff.jpg', '', '', 1),
(44, 'dpawali', 'dsaf', '2020-11-05', 'anual.jpg,fffg.jpg,diwa.jpg,fff.jpg,fffg.jpg', '', '', 1),
(45, 'offiicial party', 'fdsa', '2020-11-05', 'off4.jpg,of2.jpg,office.jpg', '', '', 1),
(46, 'event', 'fdsafnms', '2021-12-16', 'Jellyfish.jpg,,Hydrangeas.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `evencteidd` int(255) NOT NULL,
  `parent_cateid` int(255) NOT NULL,
  `eventvideo_photo_url` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1active,0inactive',
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`evencteidd`, `parent_cateid`, `eventvideo_photo_url`, `status`, `title`) VALUES
(2, 40, 'imagesff.jpg,imagess.jpg,of2.jpg,off4.jpg', 1, 'Anual functio0n'),
(3, 41, 'anual.jpg,diwa.jpg,fffg.jpg', 1, 'Deepawali'),
(4, 42, 'imagesff.jpg,imagess.jpg,of2.jpg,off4.jpg,office.jpg', 1, 'fg'),
(5, 46, 'xyz', 1, 'Desert.jpg,Chrysanthemum.jpg,Hydrangeas.jpg,Jellyfish.jpg,Koala.jpg,Lighthouse.jpg,Penguins.jpg,Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faqid` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans` text NOT NULL,
  `faq_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqid`, `question`, `ans`, `faq_status`) VALUES
(2, 'question second', '<p>secon asnwar</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquety`
--

CREATE TABLE `inquety` (
  `inquryid` int(255) NOT NULL,
  `inqury_name` varchar(255) NOT NULL,
  `inquery_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `inquery_date` date NOT NULL,
  `reply_status` int(1) NOT NULL DEFAULT 1 COMMENT '1not reply,2 replyed',
  `replygetid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquety`
--

INSERT INTO `inquety` (`inquryid`, `inqury_name`, `inquery_email`, `subject`, `message`, `inquery_date`, `reply_status`, `replygetid`) VALUES
(1, 'gfesggfsdg', 'kk@gmail.com', '20-10-02', 'khan.arbani@gmail.com', '2020-10-02', 1, 0),
(2, 'for testing pursose', 'testing@gmail.com', '20-10-02', 'khan.arbani@gmail.com', '2020-10-02', 1, 0),
(3, 'fdsf kkkkkkkkkkkkk', 'info@adiyogitechnosoft.com', '20-10-02', 'khan.arbani@gmail.com', '2020-10-02', 1, 0),
(4, 'sdfvfsdaf', 'info.rafique@gmail.com', '20-10-02', 'khan.arbani@gmail.com', '2020-10-02', 2, 0),
(5, 'Rafique', 'khan.arbani@gmail.com', '20-10-02', 'khan.arbani@gmail.com', '2020-10-02', 2, 0),
(6, '', '', '20-10-02', '<p>fdsafs</p>\r\n', '2020-10-16', 1, 5),
(10, '', '', '20-10-02', '<p>hi</p>\r\n', '2020-10-16', 1, 4),
(11, '', '', '20-10-02', '<p>hi</p>\r\n', '2020-10-16', 1, 4),
(12, 'Mohammad Rafique', 'info.rafique687@gmail.com', 'test 2 difok', 'dfsafafdas fdas', '2020-10-19', 1, 0),
(13, 'Mohammad', 'info.rafique687@gmail.com', 'fdafs', 'fdasf', '2020-10-23', 1, 0),
(14, 'Mohammad', 'info.rafique687@gmail.com', 'rewqr', 'rewqr', '2020-10-23', 1, 0),
(15, 'Mohammad', 'info.rafique687@gmail.com', 'dasf', 'fdasfsa', '2020-10-23', 1, 0),
(16, 'Mohammad', 'info.rafique687@gmail.com', 'testing', 'gedgfdsf', '2020-10-23', 1, 0),
(17, 'Mohammad', 'info.rafique687@gmail.com', 'fgsdg', 'gfdsg', '2020-10-23', 1, 0),
(18, 'Mohammad', 'info.rafique687@gmail.com', 'fgsdg', 'gfdsg', '2020-10-23', 1, 0),
(19, 'Mohammad Rafique', 'info.rafique687@gmail.com', 'testing', 'ZFZFD', '2020-11-02', 1, 0),
(20, 'Mohammad Rafique', 'info.rafique687@gmail.com', 'fdsa', 'fdas', '2020-11-02', 1, 0),
(21, 'Mohammad', 'info.rafique687@gmail.com', 'testing', 'fwg', '2020-11-05', 1, 0),
(22, 'Mohammad', 'info.rafique687@gmail.com', 'testing', 'fwg', '2020-11-05', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(255) NOT NULL,
  `root_cate` int(255) NOT NULL,
  `sub_cate` int(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `p_attribname` varchar(255) NOT NULL,
  `prod_attr_price` varchar(255) NOT NULL,
  `attrib_type` int(150) NOT NULL,
  `attrib_name` text NOT NULL,
  `faq_id` varchar(255) NOT NULL,
  `item_status` int(1) NOT NULL DEFAULT 1 COMMENT '1active/2deactive/0delete',
  `item_pic` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `root_cate`, `sub_cate`, `item_name`, `p_attribname`, `prod_attr_price`, `attrib_type`, `attrib_name`, `faq_id`, `item_status`, `item_pic`, `description`) VALUES
(1, 1, 2, 'iphone', '', '', 20, '', '2', 1, 'git.PNG,,git.PNG', '<p>description</p>\r\n'),
(2, 1, 2, 'appo', '', '', 20, '', '2', 1, 'git.PNG,,git.PNG,', '<p>ddddddddddsssss</p>\r\n'),
(3, 1, 2, 'my product', '', '', 0, '', '2', 1, 'Hydrangeas.jpg', '<p>fdsanfmaf</p>\r\n'),
(4, 1, 2, 'dummy', '', '', 0, 'one,two,three', '2', 1, 'Jellyfish.jpg', '<p>fdsaf</p>\r\n'),
(5, 1, 2, 'demo', '', '', 0, '', '2', 1, 'Desert.jpg', '<p>dafd</p>\r\n'),
(6, 1, 2, 'demo', '', '', 0, '', '2', 1, 'Desert.jpg', '<p>dafd</p>\r\n'),
(7, 1, 2, 'my product', '', '', 0, '', '2', 1, 'Koala.jpg', '<p>fdafjklsjaflkjlsajflkljalksjflkddjsljflkds</p>\r\n'),
(8, 1, 2, 'my product', '', '', 0, '', '2', 1, 'Koala.jpg', '<p>fdafjklsjaflkjlsajflkljalksjflkddjsljflkds</p>\r\n'),
(9, 1, 2, 'new item demo', '', '', 0, '', '2', 1, 'Koala.jpg', '<p>fdfm,ansf,mnas,mfn,masn,fmsn</p>\r\n'),
(10, 1, 2, 'new item demo', '', '', 0, '', '2', 1, 'Koala.jpg', '<p>fdfm,ansf,mnas,mfn,masn,fmsn</p>\r\n'),
(11, 1, 2, 'my item demo', '', '', 0, '', '2', 1, 'Hydrangeas.jpg', '<p>fdfmns,mfnsmnfdsfhjshfdjhdfjh</p>\r\n'),
(12, 1, 2, 'new demi', '', '', 0, '', '2', 1, 'Hydrangeas.jpg', '<p>fsdfmnsd</p>\r\n'),
(13, 1, 2, 'basic', 'md,dds,thi', '100,700,8000', 0, '', '2', 1, ',Chrysanthemum.jpg', '<p>fdasfsamf,</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `sts_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`sts_id`, `status`) VALUES
(1, 'Proccessed'),
(2, 'shipped'),
(3, 'delivered'),
(4, 'returnd'),
(5, 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `orderid` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `total_item` int(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `place_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `delevery_status` int(2) NOT NULL,
  `payment_status` int(1) NOT NULL DEFAULT 0 COMMENT '0no pay,1pay',
  `paid_method` varchar(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `addressid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`orderid`, `customer_id`, `total_item`, `grand_total`, `place_date`, `delevery_status`, `payment_status`, `paid_method`, `razorpay_payment_id`, `addressid`) VALUES
(1, 192, 3, '10590', '2021-11-03 07:41:47', 0, 0, 'online', '', 'paota'),
(2, 192, 1, '2000', '2021-11-03 07:47:01', 0, 0, 'online', 'pay_IH3N4k07Zt80Ik', 'paota'),
(3, 192, 2, '4500', '2021-11-03 10:23:49', 0, 0, 'online', 'pay_IH62h8lro3hzxF', 'paota'),
(4, 227, 1, '722', '2021-11-11 10:16:11', 3, 0, 'COD', '', '12222');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(255) NOT NULL,
  `parent_id` int(255) NOT NULL DEFAULT 0 COMMENT '0 mean main product',
  `main_cate` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_pic` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1active,2inactive,0delete',
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `parent_id`, `main_cate`, `product_name`, `product_pic`, `status`, `price`, `description`) VALUES
(1, 0, 0, 'first cate', 'Chrysanthemum.jpg,Desert.jpg,Hydrangeas.jpg,Jellyfish.jpg,Koala.jpg,Lighthouse.jpg,Penguins.jpg', 1, '', 'fsad,masnd'),
(2, 1, 1, 'sub cate of first', 'Chrysanthemum.jpg,Desert.jpg,Hydrangeas.jpg,Jellyfish.jpg,Koala.jpg,Lighthouse.jpg,Penguins.jpg', 1, '', 'fdasnfdm'),
(3, 0, 0, 'second cate', 'page.PNG,', 0, '', 'fdsakfm'),
(4, 0, 0, 'mwm', 'git.PNG', 1, '', 'da'),
(5, 0, 0, 'n   kk', 'elite2.png', 1, '', 'mm,');

-- --------------------------------------------------------

--
-- Table structure for table `products_attribus`
--

CREATE TABLE `products_attribus` (
  `prod_attribid` int(255) NOT NULL,
  `product_idd` int(255) NOT NULL,
  `p_attribname` varchar(255) NOT NULL,
  `prod_attr_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_attribus`
--

INSERT INTO `products_attribus` (`prod_attribid`, `product_idd`, `p_attribname`, `prod_attr_price`) VALUES
(7, 11, '0', '100'),
(8, 11, '0', '200'),
(9, 11, '0', '300'),
(10, 12, 'four', '400'),
(11, 12, 'five', '500'),
(12, 12, 'six', '600');

-- --------------------------------------------------------

--
-- Table structure for table `products_order`
--

CREATE TABLE `products_order` (
  `prod_orderid` int(255) NOT NULL,
  `fnorder_id` int(255) NOT NULL,
  `ord_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `prod_name` varchar(255) NOT NULL,
  `prod_qty` int(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `dl_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_order`
--

INSERT INTO `products_order` (`prod_orderid`, `fnorder_id`, `ord_date`, `prod_name`, `prod_qty`, `unit_price`, `total_price`, `dl_status`) VALUES
(1, 1, '0000-00-00 00:00:00', 'iPhone7', 1, '2090', '2090', 0),
(2, 1, '0000-00-00 00:00:00', 'OPPO', 2, '2000', '4000', 0),
(3, 1, '0000-00-00 00:00:00', ' Xiaomi Redmi 1S', 3, '1500', '4500', 0),
(6, 3, '2021-11-03 10:23:49', 'OPPO', 2, '2000', '4000', 0),
(7, 4, '2021-11-11 10:16:13', 'VIVI Y53', 1, '772', '772', 0),
(8, 5, '2021-11-12 07:51:50', ' Xiaomi Redmi 1S', 2, '1500', '3000', 0),
(10, 6, '2021-11-12 08:05:34', ' Xiaomi Redmi 1S', 1, '1500', '1500', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE `registeration` (
  `reg_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '1verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registeration`
--

INSERT INTO `registeration` (`reg_id`, `name`, `mobile`, `email`, `password`, `otp`, `status`) VALUES
(222, '', '9001979342', '', '', '2774', 0),
(223, '', '9799184788', '', '', '7471', 0),
(224, '', '9001979345', '', '', '7992', 0),
(227, 'Tasleem Rafique', '9799184799', 'khan.arbani@gmail.com', '222222222', '0', 0),
(228, 'sarik', '9221212141', 'fsakj@gmail.com', '4444444444', '0', 0),
(229, '', '9001979340', '', '', '9816', 0),
(230, '', '9799184700', '', '', '5668', 0),
(231, 'sarikl', '9001111112', 'fsakj@gmail.com', '6666666666', '0', 0),
(232, '', '9166854602', '', '', '3878', 0),
(233, '', '8888888888', '', '', '7818', 0),
(234, '', '7777777777', '', '', '5627', 0),
(235, 'Tasleem Rafique', '9332323656', 'khan.arbani@gmail.com', '222222222', '0', 0),
(236, '', '9414561447', '', '', '7335', 0),
(237, '', '9466775501', '', '', '7511', 0),
(238, '', '9461133000', '', '', '7360', 0);

-- --------------------------------------------------------

--
-- Table structure for table `send_maildetails`
--

CREATE TABLE `send_maildetails` (
  `mail_id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `mailreceiver` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `send_maildetails`
--

INSERT INTO `send_maildetails` (`mail_id`, `subject`, `message`, `attachment`, `date`, `mailreceiver`) VALUES
(1, 'test', 'fdsjalfjakfkjajsfklj', 'dsfsd', '2020-09-12', 'rafiq@gnail.com,alihasan@gmail.com,iniyaz@gmail.com'),
(2, 'test2', 'ters2 fjdslafulksajf', 'fdsaf', '2020-09-30', 'fdsafasdfas@gmnia.com,ra@gmail.com,kk@gmial.com'),
(3, 'pppppppppd', '<p>gsdfg</p>\r\n', '', '2020-09-28', 'info.rafique687@gmail.com,khan.arbani@gmail.com'),
(4, 'database', '<p>fdsaf</p>\r\n', '', '2020-09-28', 'khan.arbani@gmail.com,info.rafique687@gmail.com'),
(5, 'with pic', '<p>sd</p>\r\n', 'apple-touch-icon.png', '2020-09-28', 'khan.arbani@gmail.com,info.rafique687@gmail.com'),
(6, 'fdaf', '<p>fdas</p>\r\n', '', '2020-09-28', 'khan.arbani@gmail.com,info.rafique687@gmail.com'),
(7, 'testing', '<p>dfsg</p>\r\n', '', '2020-10-10', 'khan.arbani@gmail.com'),
(8, 'fs', '<p>fdsa</p>\r\n', '', '2020-10-10', 'info.rafique687@gmail.com'),
(9, 'fs', '<p>fdsa</p>\r\n', '', '2020-10-10', 'info.rafique687@gmail.com'),
(10, 'dfsa', '<p>fdsaf</p>\r\n', '', '2020-10-10', 'info.rafique687@gmail.com,khan.arbani@gmail.com,'),
(11, 'testing', '<p>ghhhhhh</p>\r\n', '', '2020-10-13', 'info.rafique687@gmail.com,fdkasj@df.com,');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(255) NOT NULL,
  `sevices_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `service_des` varchar(255) NOT NULL,
  `service_status` varchar(255) NOT NULL,
  `service_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `sevices_name`, `icon`, `service_des`, `service_status`, `service_pic`) VALUES
(1, 'Accounting', 'fa fa-money', 'Equity trading refers to the purchase or sale of a company’s stocks through major stock exchanges like the NSE (National Stock Exchanges) and BSE (Bombay Stock Exchanges). Companies open their shares to the public in the equity market, allowing you to buy', '0', 'account.jpg,account.jpg,pic.jpg,Accounting.jpg,incometax.jpg,service1.jpg'),
(2, 'GST', 'fa fa-calculator', 'How about availing 100% service value while utilizing only 10% capital? That’s the beauty of derivative market. Derivative instruments derive their value from underlying assets which can be Equity, Indices, Currency or Commodity. In derivative market we c', '1', 'dd.jpg,dd.jpg,pics.jpg'),
(3, 'Income Tax', 'fa fa-tax icon', 'Commodities have emerged as the next best option for investors, after stocks and bonds. The commodity market trades in the primary economic sector rather than manufactured goods. Some of the popular commodities include gold, silver, oil, wheat, etc. With', '1', 'incometax.jpg,taxx.jpg,photo (1).jpg,service3.jpg'),
(4, 'Web Development & Designing', 'fa fa-code', 'Currency trading, as its name suggests, refers to the purchase and sale of different currencies in the world. The Foreign Exchange or Forex, the world’s largest financial market, allows investors to trade currencies in volume. The most traded currencies i', '1', 'webdesign.png,webdesign.png,service4.jpg'),
(5, 'Mobile App Development', 'fa fa-android', 'Mobile is reigning the once web-powered online industry. Sharing the momentum, we at Adiyogi, create mobile applications that stand out in the industry for its design as well as user engagement. We love to work with you to make your dream project a realit', '1', 'app.png,app.png,soft.png,webdesign.png'),
(6, 'Digital Marketing', 'fa fa-bullhorn', 'As a Digital Marketing company, we offer Technical SEO Audits, Search Engine Optimization Strategies, Google AdWords Advertising (Search Engine Marketing, Pay Per Click Management & Video Advertising), Social Media Strategies, and Creative Content Resulti', '1', 'soft.png,soft.png,Social media post.jpg,3.jpg,Social media post.jpg'),
(7, 'my services', 'fa fa edit', 'fdsanfmsn							', '0', 'Chrysanthemum.jpg,Desert.jpg,Hydrangeas.jpg,Jellyfish.jpg,Koala.jpg,Lighthouse.jpg,Penguins.jpg,Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting_table`
--

CREATE TABLE `setting_table` (
  `sessting_id` int(255) NOT NULL,
  `section_id` int(255) NOT NULL DEFAULT 1,
  `field_name` varchar(255) NOT NULL,
  `field_value` varchar(5000) NOT NULL,
  `field_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_table`
--

INSERT INTO `setting_table` (`sessting_id`, `section_id`, `field_name`, `field_value`, `field_type`) VALUES
(1, 1, 'Site name', 'CMS', 'text'),
(2, 1, 'Mobile', '919799184788', 'text'),
(3, 1, 'Email', 'info@ifresh.co.in', 'email'),
(4, 1, 'Logo', 'elite1.png', 'file'),
(5, 1, 'Fevicon', 'elite2.png', 'file'),
(15, 2, 'Title', 'About Us', 'text'),
(16, 2, 'SEO Meta', 'We Provide a full range of Website,We Provid High Quality and cost effective Services,We Are Specialists in SEO, PPC, Content Marketing and Social Media,We design and build responsive, reliable websites that serve your unique online needs.', 'text'),
(19, 2, 'Short Description', 'We Provide a full range of Website Design Services, eCommerce Solutions, Content Management Systems (CMS), Search Engine Optimisation (SEO), Social Media and Web Solutions for any business, anywhere.\r\nWe are leading IT company, dealing with IT services Su', 'textarea'),
(20, 2, 'About', '<h4>Our Mission</h4>\r\n\r\n<p><strong>You Sprout, We Bloom</strong><br />\r\nis our only Mission at Elite Mantra. Our TechoFreaks and MarketingGeaks meet you with their only mission to help you prosper in your business. Don&#39;t hire the company but hire the People as your Own.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4>Our Vision</h4>\r\n\r\n<p><strong>Internet Bolta Hai (Internet Speaks)</strong><br />\r\nSince we know the Internet better, we understand that it speaks. Our Vision at Elite Mantra is to translate Internet to You and Vice Versa. We speak your language and our work speak as that of Internet.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4>Our Culture</h4>\r\n\r\n<p><strong>Customer is Family</strong><br />\r\nYou might have heard about common cultures that Customer is always right or Customer is God but for us at Elite Mantra, you are our Family and as our ancestors taught us that&nbsp;<em>Family always Comes First</em></p>\r\n', 'fck'),
(23, 3, 'Title', 'Terms and condition Title', 'text'),
(24, 3, 'SEO Meta Key', 'Key words', 'tex'),
(25, 3, 'Shord Description', 'Seo Short Description', 'textarea'),
(26, 3, 'Content', '<p>Business terms and conditions set the contract foundation between you and your customer. It doesn&rsquo;t matter if your business provides products or services, a terms-and-conditions document is essential. It protects your business, defines your procedures,</p>\r\n', 'fck'),
(27, 4, 'Privacy Policy', 'Privacy policy title', 'text'),
(29, 4, 'SEO script', 'seo meta tag', 'text'),
(30, 4, 'short Description', 'short description about Privacy policy', 'textarea'),
(31, 4, 'content', '<p>Our agreements with certain business customers may contain provisions about the collection, use, storage and disposal of information collected through the Services and offline. If a provision of a customer agreement conflicts or otherwise is inconsiste</p>\r\n', 'fck'),
(32, 5, 'Title', 'service title', 'text'),
(33, 5, 'Seo  Meta Script', 'seo key word', 'text'),
(34, 5, 'Short Descripton', 'We Provide a full range of Website Design Services, eCommerce Solutions, Content Management Systems (CMS), Search Engine Optimisation (SEO), Social Media and Web Solutions for any business, anywhere.\r\nWe Provid High Quality and cost effective Services.\r\nW', 'textarea'),
(35, 5, 'Content', '<p>Our agreements with certain business customers may contain provisions about the collection, use, storage and disposal of information collected through the Services and offline. If a provision of a customer agreement conflicts or otherwise is inconsiste', 'fck'),
(36, 6, 'Face Book Url', 'https://www.facebook.com/Elite-Mantra', 'text'),
(37, 6, 'Instagram', 'https://www.instagram.com/elite-mantra', 'text'),
(38, 6, 'LinkedIn', 'https://www.linkedin.com/company/elite-mantra', 'text'),
(39, 6, 'Twitter', '', 'text'),
(40, 6, 'Google+', '', 'text'),
(41, 7, 'Home Title', 'What we Do', 'text'),
(42, 7, 'Home Short Description', 'As a concept, trade marketing is completely misunderstood. Yet it\'s incredibly important, so today I\'m going to explain what trade marketing is, why it’s important, who uses it and how.\r\nI\'ll cover trade marketing examples, tools and techniques, plus help', 'textarea'),
(43, 1, 'Location', '48, Whispering Palms Shopping Center, \r\nLokhandwala Township, \r\nAkurli Road, Kandivali (E) Mumbai - 400 101.', 'textarea'),
(44, 1, 'Map Location', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.9428146231276!2d72.8690849149031!3d19.197699887018203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b715bc6368e9%3A0xc3d28d9648536dff!2sElite%20Mantra!5e0!3m2!1sen!2sin!4v1639415704373!5m2!1sen!2sin																			', 'textarea'),
(45, 1, 'Live Chat', '<script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/5f96a2ae2915ea4ba096b368/default\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script>																				', 'textarea'),
(46, 8, 'faq', 'fdaf', 'fck');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateid` int(255) NOT NULL,
  `contery_id` int(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateid`, `contery_id`, `state`) VALUES
(1, 1, 'Rajasthan'),
(2, 1, 'Gujrat');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `dp` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `name`, `designation`, `dp`, `twitter`, `facebook`, `instagram`, `linkedin`, `status`) VALUES
(1, 'Mohammad Rafique', 'developer', '5b7ad435200000420034abec.jpeg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(2, 'piyush sharma', ' android devloper', '1483514496-9388.jpg', '  twiter', '  facebook', '  insta', '  in', 0),
(3, 'Mohammad Rafiquegf', 'developer', '1483514496-9388.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(4, 'Mohammad ', 'developer', '', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(5, 'Mohammad ', 'developer', '5b7ad435200000420034abec.jpeg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(6, 'Dharmendra sir', 'Mean Devloper', 'team-1.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(7, 'Dharmendra sir', 'Mean Devloper', 'team-3.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(8, 'Dharmendra sir', 'Mean Devloper', 'team-1.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(9, 'piyush sharma', ' android devloper', 'team-3.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(10, 'Nikhil', 'Nodjs', 'services-4.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(11, 'Mohammad Rafique', 'Php Devloper', 'team-1.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(12, 'Nikhil', 'Nodjs', 'team-3.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(13, 'Nikhil', 'Nodjs', 'team-1.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(14, 'Dharmendra sir', 'Mean Devloper', 'tm1.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 0),
(15, 'Nikhil yadav', 'Nodjs', 'tm2.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 1),
(16, 'Nikhil', 'Nodjs', 'tm4.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 1),
(17, 'Nikhil', 'Nodjs', 'tm1.jpg', 'twitter', 'facebook', 'insta', 'linkedin', 1),
(18, 'Dharmendra sir', 'Mean Devloper', '', 'twitter', 'facebook', 'insta', 'linkedin', 1),
(19, 'Dharmendra sir', 'Mean Devloper', '', 'twitter', 'facebook', 'insta', 'linkedin', 1),
(20, 'Dharmendra sir', 'Mean Devloper', '', 'twitter', 'facebook', 'insta', 'linkedin', 1),
(21, 'Dharmendra sir', 'Mean Devloper', '', 'twitter', 'facebook', 'insta', 'linkedin', 1),
(22, 'Nikhil yadav', 'Nodjs', '', 'twitter', 'facebook', 'insta', 'linkedin', 1),
(23, 'Nikhil', 'Nodjs', '', 'twitter', 'facebook', 'insta', 'linkedin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `textsmessage`
--

CREATE TABLE `textsmessage` (
  `sms_id` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `customerno` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `textsmessage`
--

INSERT INTO `textsmessage` (`sms_id`, `message`, `customerno`, `date`) VALUES
(1, '										\r\n	dsaff															', '9001979342,9799184788', '2020-09-12'),
(2, '										\r\n			dvsf													', '9001979342,9799184788', '2020-09-12'),
(3, '										\r\n							cc									', '9001979342,9799184788', '2020-09-28'),
(4, '										\r\n	fdsafkjgjhsagdfhgsfa															', '9001212145,8552525654,', '2020-10-12'),
(5, '			adfsaf							\r\n																', '8221212525,7441412458,', '2020-10-12'),
(6, '										\r\n			fdsa													', '9223333333,', '2020-10-12'),
(7, '				czc						\r\n																', '9001212352,', '2020-10-12'),
(8, '										\r\n			gfh													', '9799184788,9001979342', '2020-10-13'),
(9, 'safdsa', '9001212145,9001979342', '2020-10-13'),
(10, 'gfdsf														', '9799184788,9001979342', '2020-10-13'),
(11, ',mjnbmnb', '  9001979342', '2020-10-13'),
(12, '										\r\n		ttrthg																\r\n																								', '9799184788,9001979342', '2020-10-13'),
(13, 'vdsg', '9799184788,9001979342', '2020-10-13'),
(14, 'dsg', 'info.rafique687@gmail.com', '2020-10-14'),
(15, 'fdsandfm', '9799184788,9001979342', '2021-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `adr_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` int(255) NOT NULL,
  `state` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` int(255) NOT NULL,
  `position` int(255) NOT NULL,
  `default_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`adr_id`, `user_id`, `address`, `country`, `state`, `city`, `zipcode`, `position`, `default_address`) VALUES
(179, 156, 'paota man ji ka hatha', 0, 0, 'jodhpur', 342001, 0, '1'),
(180, 192, 'paota', 0, 0, 'jodhpur', 342001, 0, '1'),
(181, 192, 'paota maan ji ka hattha', 0, 0, 'jodhpur', 342001, 0, '1'),
(182, 192, 'paota kkkk', 0, 0, 'jodhpur', 342001, 0, '1'),
(183, 192, 'paota l;kl;kd;lkvdflkds', 0, 0, 'jodhpur', 342001, 0, '1'),
(184, 227, '12222', 0, 0, 'JODHPUR', 344022, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `whatsmessage`
--

CREATE TABLE `whatsmessage` (
  `whatapp_id` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `attach` varchar(255) NOT NULL,
  `customerno` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `whatsmessage`
--

INSERT INTO `whatsmessage` (`whatapp_id`, `message`, `attach`, `customerno`, `date`) VALUES
(1, '			fgsdjgkjsfhg							\r\n																', 'xyz.file', '9799184788,9001979342', '2020-09-12'),
(2, '			fgsdjgkjsfhg							\r\n																', 'xyz.file', '9799184788,9001979342', '2020-09-12'),
(3, '			fgsdjgkjsfhg							\r\n																', 'xyz.file', '9799184788,9001979342', '2020-09-12'),
(4, '			fgsdjgkjsfhg							\r\n																', 'xyz.file', '9799184788,9001979342', '2020-09-12'),
(5, '			sgdsfg							\r\n																', 'xyz.file', '9799184788,9001979342', '2020-09-12'),
(6, '	csdsf									\r\n																', 'xyz.file', '9001979342,9799184788', '2020-09-12'),
(7, '										\r\n		dsfa														', 'xyz.file', '9001979342,9799184788', '2020-09-12'),
(8, '										\r\n	dfs															', 'xyz.file', '9001979342,9799184788', '2020-09-12'),
(9, '				gfdgd						\r\n																', 'xyz.file', '9001979342', '2020-10-10'),
(10, '										\r\n			adfsfa													', 'xyz.file', '9001212425,7445254578,', '2020-10-12'),
(11, '					fasf					\r\n																', 'xyz.file', '9001212545,', '2020-10-12'),
(12, 'fasfas', 'xyz.file', '', '2020-10-12'),
(13, 'frkfguya', 'xyz.file', '9001979342,7441212456,', '2020-10-12'),
(14, 'fdasf', 'xyz.file', '9001979342,8552121256,', '2020-10-12'),
(15, 'hgf', 'xyz.file', '9001979342,', '2020-10-12'),
(16, '										\r\n																', 'xyz.file', 'info.rafique687@gmail.com,khan.arbani@gmail.com', '2020-10-13'),
(17, '										\r\n																', 'xyz.file', '9799184788,9001979342', '2020-10-13'),
(18, '										\r\n																', 'xyz.file', '9799184788,9001979342', '2020-10-13'),
(19, '										\r\n																', 'xyz.file', '9799184788,9001979342', '2020-10-13'),
(20, '										\r\n																', 'xyz.file', '9799184788,9001979342', '2020-10-13'),
(21, '										\r\n																', 'xyz.file', '9799184788,9001979342', '2020-10-13'),
(22, '										\r\n																', 'xyz.file', '9799184788,9001979342', '2020-10-13'),
(23, '										\r\n																', 'xyz.file', '9799184788,9001979342', '2020-10-13'),
(24, '			hghf							\r\n																		\r\n																								', 'xyz.file', '9799184788,9001979342', '2020-10-13'),
(25, 'dsafjlkjfljlk', 'xyz.file', '9001979342,8552525654', '2020-10-13'),
(26, 'fdsajkfj							\r\n																', '', '9799184788,9001979342', '2020-10-13'),
(27, 'kkk', '', '9001979342', '2020-10-13'),
(28, 'gggg', '', '  9001979342', '2020-10-13'),
(29, 'fdsaf', '', '9799184788,9001979342', '2020-10-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_setting`
--
ALTER TABLE `admin_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attrib`
--
ALTER TABLE `attrib`
  ADD PRIMARY KEY (`attrid`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bannerid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ctid`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contry`
--
ALTER TABLE `contry`
  ADD PRIMARY KEY (`contryid`);

--
-- Indexes for table `cutomar_details`
--
ALTER TABLE `cutomar_details`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`evencteidd`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faqid`);

--
-- Indexes for table `inquety`
--
ALTER TABLE `inquety`
  ADD PRIMARY KEY (`inquryid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`sts_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `products_attribus`
--
ALTER TABLE `products_attribus`
  ADD PRIMARY KEY (`prod_attribid`);

--
-- Indexes for table `products_order`
--
ALTER TABLE `products_order`
  ADD PRIMARY KEY (`prod_orderid`);

--
-- Indexes for table `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `send_maildetails`
--
ALTER TABLE `send_maildetails`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `setting_table`
--
ALTER TABLE `setting_table`
  ADD PRIMARY KEY (`sessting_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `textsmessage`
--
ALTER TABLE `textsmessage`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`adr_id`);

--
-- Indexes for table `whatsmessage`
--
ALTER TABLE `whatsmessage`
  ADD PRIMARY KEY (`whatapp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_setting`
--
ALTER TABLE `admin_setting`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attrib`
--
ALTER TABLE `attrib`
  MODIFY `attrid` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bannerid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ctid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contry`
--
ALTER TABLE `contry`
  MODIFY `contryid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cutomar_details`
--
ALTER TABLE `cutomar_details`
  MODIFY `cust_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `evencteidd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquety`
--
ALTER TABLE `inquety`
  MODIFY `inquryid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `sts_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `orderid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_attribus`
--
ALTER TABLE `products_attribus`
  MODIFY `prod_attribid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products_order`
--
ALTER TABLE `products_order`
  MODIFY `prod_orderid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registeration`
--
ALTER TABLE `registeration`
  MODIFY `reg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `send_maildetails`
--
ALTER TABLE `send_maildetails`
  MODIFY `mail_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setting_table`
--
ALTER TABLE `setting_table`
  MODIFY `sessting_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `textsmessage`
--
ALTER TABLE `textsmessage`
  MODIFY `sms_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `adr_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `whatsmessage`
--
ALTER TABLE `whatsmessage`
  MODIFY `whatapp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
