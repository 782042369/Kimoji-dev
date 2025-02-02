<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     HDVinnie <hdinnovations@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

namespace Database\Seeders;

use Assada\Achievements\Model\AchievementDetails as AchievementDetail;
use Illuminate\Database\Seeder;

class AchievementDetailsTableSeeder extends Seeder
{
    private $achievementDetails;

    public function __construct()
    {
        $this->achievementDetails = $this->getAchievementDetails();
    }

    /**
     * Auto generated seed file.
     */
    public function run(): void
    {
        foreach ($this->achievementDetails as $ad) {
            AchievementDetail::updateOrCreate($ad);
        }
    }

    private function getAchievementDetails(): array
    {
        return [
            [
                'id'          => 2,
                'name'        => '初次笔谈',
                'description' => '恭喜！如同初次舞会的邀请函，您已优雅地撰写了首条评论！',
                'points'      => 1,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMadeComment::class,
                'created_at'  => '2017-02-28 17:22:37',
                'updated_at'  => '2017-04-21 12:52:01',
            ],
            [
                'id'          => 3,
                'name'        => '新秀',
                'description' => '哇！您的评论如冉冉升起的新星，迅速累积了10条闪耀的见解！',
                'points'      => 10,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMadeTenComments::class,
                'created_at'  => '2017-02-28 17:22:37',
                'updated_at'  => '2017-04-21 12:21:06',
            ],
            [
                'id'          => 4,
                'name'        => '初恋',
                'description' => '恭喜！您就像初恋般令人难忘，成功播下了第一颗梦想之种！',
                'points'      => 1,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMadeUpload::class,
                'created_at'  => '2017-03-01 13:31:50',
                'updated_at'  => '2017-03-22 14:59:32',
            ],
            [
                'id'          => 5,
                'name'        => '达人',
                'description' => '您就如同园艺大师，巧手栽培，已经播种了25颗希望之芽！',
                'points'      => 25,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade25Uploads::class,
                'created_at'  => '2017-03-02 23:19:34',
                'updated_at'  => '2017-04-21 12:21:06',
            ],
            [
                'id'          => 6,
                'name'        => '贵族',
                'description' => '哇塞！您的言辞犹如绅士的手帕或淑女的手套，已经优雅地留下了50条珍贵的印记！',
                'points'      => 50,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade50Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 7,
                'name'        => '导师',
                'description' => '您的评论像是指引灯塔，照亮了百条言语之路！',
                'points'      => 100,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade100Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 8,
                'name'        => '鉴赏家',
                'description' => '您的评论堪比艺术品，每一条都值得细细品味，现已收藏了200条！',
                'points'      => 200,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade200Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 9,
                'name'        => '大亨',
                'description' => '您的评论已成为这个圈子不可或缺的财富，总计达到了300条辉煌篇章！',
                'points'      => 300,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade300Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 10,
                'name'        => '领袖',
                'description' => '哇！您的评论如领袖般引领风骚，已累计发表400条令人敬仰的观点！',
                'points'      => 400,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade400Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 11,
                'name'        => '巨匠',
                'description' => '您的评论如同巨匠的作品，每一笔都是时间的见证，现已堆积了500条经典！',
                'points'      => 500,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade500Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 12,
                'name'        => '宗师',
                'description' => '哇！您的评论已经到达了宗师级别，累计600条让人佩服的深度解析！',
                'points'      => 600,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade600Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 13,
                'name'        => '瑰宝',
                'description' => '您在评论的海洋徜徉，700条见解犹如珍珠般散落其间！',
                'points'      => 700,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade700Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 14,
                'name'        => '大评论家',
                'description' => '哇！您的每一条评论都显示了您对话语的洞察，已经累积800条值得反复琢磨的评论！',
                'points'      => 800,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade800Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 15,
                'name'        => '皇帝',
                'description' => '哇！您的评论帝国壮观无比，已累计发表900条让世人赞叹的精彩评论！',
                'points'      => 900,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade900Comments::class,
                'created_at'  => '2017-04-21 13:04:26',
                'updated_at'  => '2017-04-21 13:04:26',
            ],
            [
                'id'          => 16,
                'name'        => '播种者',
                'description' => '祝贺！您已经慷慨地传播了50个种子，为KIMOJI的田野注入活力！',
                'points'      => 50,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade50Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 17,
                'name'        => '工匠',
                'description' => '您的百个种子已经播下，感谢您以行动培育KIMOJI的花园！',
                'points'      => 100,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade100Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 18,
                'name'        => '领航者',
                'description' => '两百个种子成功生根，您的努力正在开辟KIMOJI的新领域！',
                'points'      => 200,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade200Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 19,
                'name'        => '先驱',
                'description' => '三百个种子扎根于此，您的领导将KIMOJI引向繁盛！',
                'points'      => 300,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade300Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 20,
                'name'        => '传奇',
                'description' => '四百个种子已萌芽，您的传奇故事在KIMOJI生根发芽！',
                'points'      => 400,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade400Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 21,
                'name'        => '战略家',
                'description' => '五百个种子广泛传播，感谢您将丰盈的收获带给KIMOJI！',
                'points'      => 500,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade500Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 22,
                'name'        => '造诣家',
                'description' => '六百个种子茁壮成长，您的造诣深厚，影响深远！',
                'points'      => 600,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade600Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 23,
                'name'        => '泰斗',
                'description' => '七百个种子，您的手艺如泰山般坚实，您是KIMOJI的泰斗！',
                'points'      => 700,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade700Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 24,
                'name'        => '帝王',
                'description' => '八百个种子铸就帝王般的荣耀，感谢您对KIMOJI无上的贡献！',
                'points'      => 800,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade800Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 25,
                'name'        => '至尊',
                'description' => '九百个种子，您的成就至高无上，对KIMOJI的贡献堪比至尊！',
                'points'      => 900,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade900Uploads::class,
                'created_at'  => '2017-04-21 13:29:51',
                'updated_at'  => '2017-04-21 13:29:51',
            ],
            [
                'id'          => 26,
                'name'        => '秀才',
                'description' => '恭喜您！您已成功发布了您的第一篇帖子！',
                'points'      => 1,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMadeFirstPost::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:38:48',
            ],
            [
                'id'          => 27,
                'name'        => '举人',
                'description' => '哇哦！您已经发表了二十五篇充满想法的帖子！',
                'points'      => 25,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade25Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 28,
                'name'        => '进士',
                'description' => '哇哦！您的帖子数量已经达到五十篇，记录了许多有趣的讨论！',
                'points'      => 50,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade50Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 29,
                'name'        => '解元',
                'description' => '哇哦！您已经发表了一百篇帖子，编织了一个个精彩的话题！',
                'points'      => 100,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade100Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 30,
                'name'        => '会元',
                'description' => '哇哦！您的两百篇帖子给KIMOJI社区带来了许多精彩内容！',
                'points'      => 200,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade200Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 31,
                'name'        => '榜眼',
                'description' => '哇哦！您已经发表了三百篇帖子，每一篇都充满洞察力与智慧！',
                'points'      => 300,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade300Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 32,
                'name'        => '探花',
                'description' => '哇哦！您以四百篇帖子，构筑了一个个深入的讨论与回忆！',
                'points'      => 400,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade400Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 33,
                'name'        => '状元',
                'description' => '哇哦！您已经发表了五百篇帖子，分享了您丰富多彩的见解和故事！',
                'points'      => 500,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade500Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 34,
                'name'        => '郎中',
                'description' => '哇哦！六百篇帖子，承载着您的智慧与创意，为社区增添色彩！',
                'points'      => 600,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade600Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 35,
                'name'        => '侍郎',
                'description' => '哇哦！七百篇帖子已送出，每一篇都展现了您对话题的深刻理解！',
                'points'      => 700,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade700Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 36,
                'name'        => '尚书',
                'description' => '哇哦！八百篇帖子，如同密语，展现了您与社区成员间的紧密联系！',
                'points'      => 800,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade800Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 37,
                'name'        => '大学士',
                'description' => '哇哦！九百篇帖子记录了您与KIMOJI世界的深刻交流与笔谈！',
                'points'      => 900,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserMade900Posts::class,
                'created_at'  => '2017-04-21 18:37:09',
                'updated_at'  => '2017-04-21 18:37:09',
            ],
            [
                'id'          => 38,
                'name'        => '心愿成真',
                'description' => '祝贺您！您已经如愿以偿地实现了二十五个心愿！',
                'points'      => 25,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserFilled25Requests::class,
                'created_at'  => '2017-08-28 23:55:56',
                'updated_at'  => '2017-08-28 23:55:56',
            ],
            [
                'id'          => 39,
                'name'        => '五十心愿达成',
                'description' => '哇哦！您已经成功实现了五十个心愿！',
                'points'      => 50,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserFilled50Requests::class,
                'created_at'  => '2017-08-28 23:55:56',
                'updated_at'  => '2017-08-28 23:55:56',
            ],
            [
                'id'          => 40,
                'name'        => '心愿绽放',
                'description' => '呜呼！您已经让七十五个愿望灿烂绽放！',
                'points'      => 75,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserFilled75Requests::class,
                'created_at'  => '2017-08-28 23:55:56',
                'updated_at'  => '2017-08-28 23:55:56',
            ],
            [
                'id'          => 41,
                'name'        => '百愿兑现',
                'description' => '天哪！您竟已巧手兑现了一百个愿望！',
                'points'      => 100,
                'secret'      => 0,
                'class_name'  => \App\Achievements\UserFilled100Requests::class,
                'created_at'  => '2017-08-28 23:55:56',
                'updated_at'  => '2017-08-28 23:55:56',
            ],
        ];
    }
}
