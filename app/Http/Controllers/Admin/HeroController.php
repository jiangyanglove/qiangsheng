<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\User;
use App\Models\Hero;

class HeroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $heroes = Hero::orderBy('id', 'asc')->paginate(10);

        $page_title = 'DISC英雄列表';

        return view('admin.hero.index', compact(['heroes', 'page_title']));
    }

    /**
     * 批量导入英雄数据
     *
     */
    public function import()
    {
        DB::table('heroes')->insert([
            'type' => 'A',
            'sex' => '1',
            'title' => 'Dominance为支配型性格较为突出，其解释如下：',
            'title_en' => 'You have a dominant personality (represented by Dominance). The explanations are as follows:',
            'explanations' => '支配度高者有自己的想法，且非常想成功，同时极擅于让别人依他们的方法做事，具有支配能量高的人会做全盘考虑，并看情况是否有利，为满足自己的需要，他们会透过直接且压迫性的行为掌控环境，但现况不利时，他们通常能压住反对的声音。',
            'explanations_en' => 'Highly dominant people have their own ideas. They are eager for success, and are adept at making other people do things according to their ways. A highly dominant person can give an overall consideration of things, and judge whether the circumstances are favorable. He or she would command the environment in a direct and oppressive manner, and can stifle opposition when the current circumstances are not favorable.',
            'when_at_work' => '支配度高者很像生意人。他们的工作环境忙碌、正式、有效率、有组织且功能性高。果断、反应快的人擅言词，同时尖锐而不圆融，因为他们以事为主，并要求结果。高自我意识的长处，使这类人经常成为组织的火车头，因为他们好胜、喜欢改变且讨厌现况。身为爱探险的行动派，这类人要的是直接答案，且喜欢马上看到结果。',
            'when_at_work_en' => 'Highly dominant people are quite similar to businessmen. They work in a busy, formal, efficient, organized and highly functional environment. They are of a very determined character, and can make quick response. They would handle matters in a direct way without being tactful, because they focus on handling matters and are eager to see the results. Being highly self-conscious, they usually become the “railway engine” of an organization, because they are eager for outdoing others, fond of seeing changes, and hate the status quo. With an exploring spirit, they take prompt actions. They look for direct answers, and like to see the immediate results.',
            'hero_name' => '雷神',
            'hero_name_en' => 'Thor',
            'hero_desc' => '在北欧神话中，奥丁之子索尔拥有掌管闪电与风暴的能力，是复仇者联盟中能力最稳定、坚强的存在，在巨大的挑战面前，也永不退缩。身为一个神域的领导者，他不会轻易向命运低头，坚信只有自己能够掌握自己的命运，同时控制欲比较强，习惯自己独立思考和决策，并关注结果。',
            'hero_desc_en' => 'In the mythology of North Europe, Thor, the son of Odin, is commanding lightning and storm. He is the most stable and powerful presence in The Avengers. He never flinches from huge challenges. As a leader in the world of deities, he does not bow his head easily before the fate. Instead, he is convinced that he can control his own fate. He also has a strong sense of control, is used to thinking and making decisions on his own, and cares about the result.',
            'icon' => 'Thor.jpg',
        ]);

        DB::table('heroes')->insert([
            'type' => 'A',
            'sex' => '2',
            'title' => 'Dominance为支配型性格较为突出，其解释如下：',
            'title_en' => 'You have a dominant personality (represented by Dominance). The explanations are as follows:',
            'explanations' => '支配度高者有自己的想法，且非常想成功，同时极擅于让别人依他们的方法做事，具有支配能量高的人会做全盘考虑，并看情况是否有利，为满足自己的需要，他们会透过直接且压迫性的行为掌控环境，但现况不利时，他们通常能压住反对的声音。',
            'explanations_en' => 'Highly dominant people have their own ideas. They are eager for success, and are adept at making other people do things according to their ways. A highly dominant person can give an overall consideration of things, and judge whether the circumstances are favorable. He or she would command the environment in a direct and oppressive manner, and can stifle opposition when the current circumstances are not favorable.',
            'when_at_work' => '支配度高者很像生意人。他们的工作环境忙碌、正式、有效率、有组织且功能性高。果断、反应快的人擅言词，同时尖锐而不圆融，因为他们以事为主，并要求结果。高自我意识的长处，使这类人经常成为组织的火车头，因为他们好胜、喜欢改变且讨厌现况。身为爱探险的行动派，这类人要的是直接答案，且喜欢马上看到结果。',
            'when_at_work_en' => 'Highly dominant people are quite similar to businessmen. They work in a busy, formal, efficient, organized and highly functional environment. They are of a very determined character, and can make quick response. They would handle matters in a direct way without being tactful, because they focus on handling matters and are eager to see the results. Being highly self-conscious, they usually become the “railway engine” of an organization, because they are eager for outdoing others, fond of seeing changes, and hate the status quo. With an exploring spirit, they take prompt actions. They look for direct answers, and like to see the immediate results.',
            'hero_name' => 'Superman',
            'hero_name_en' => 'Superman',
            'hero_desc' => '超人在氪星面临毁灭之际，被父母把还在襁褓中的他送到了地球，他有着与生俱来的超能力和极强的正义感与同情心，而他的独立思考、结果把控能力使他在人类遇到威胁的时刻，能够成为一个团队的核心带领着超级英雄们去战胜那些威胁，保护人类，同时他坚信命运会随着自己的努力和坚持而改变。',
            'hero_desc_en' => 'When the planet Krypton was about to be destroyed, Superman, who was still an infant, was sent by his parents to the Earth. He has extraordinary capabilities since he was born, and later showed extremely strong sense of justice and sympathy. Owing to his independent thinking and result controlling capabilities, he can, as the core member in a team composed of super heroes, protect the humans from external threats. Moreover, he is convinced that a person can change his fate with his efforts and perseverance.',
            'icon' => 'Superman.jpg',
        ]);

        DB::table('heroes')->insert([
            'type' => 'B',
            'sex' => '1',
            'title' => 'Influence为影响型性格较为突出，其解释如下：',
            'title_en' => 'You have an influential personality. The explanations are as follows:',
            'explanations' => '影响度高者的沟通能力强，并对自己的社交能力很有自信。为了满足需要，他们经常利用极佳的口才说服他人共同合作。他们生性较乐观，会将大多数状况视为有利条件。他们非常外向，且以人为主，同时珍惜关系。他们喜欢人际接触频繁的环境，因为他们在任何时候都可以交朋友。影响型喜欢招待他人，懂得享受美食与餐厅气氛。这类人追求时髦，喜爱行动自由与物质享受。他们的工作环境友善、个人化且可激发创意。',
            'explanations_en' => 'People with a high degree of influence have a strong capability of communication, and are quite confident in their interpersonal skills. They often persuade others to cooperate with them with convincing words. Such people are optimistic, and regard most of the circumstances as favorable conditions. They are quite extroverted, take people first, and cherish the relationships with others. They are used to an environment characterized by frequent interpersonal contacts, where they can make friends at any time. They are willing to entertain others, and enjoy cuisines as well as the atmosphere in the restaurant. They always follow the fashion, like the freedom to take actions as well as material enjoyment. The work environment of such a type of person is friendly, personalized and can create innovative ideas.',
            'when_at_work' => '影响度高者的步调快速又即兴，除非他们想获得他人的赏识，否则一般而言他们会忽略细节，且杂乱无章。这类人会迅速把所有的东西塞进抽屉，为什么？没错，为了看来更「体面」。周遭居住或工作的人，几乎不可能从他们的桌子或档案.找到任何东西，可是，他们就是知道东西「就在这儿附近」。影响度高者天生对人性乐观，但其特质的缺点之一，就是对谁都信赖，且听他人说话，会选择性的听与自己想听的东西，或者自己乐观希望发生的部份。',
            'when_at_work_en' => 'People with a high degree of influence take actions in a fast tempo and in an impromptu way. They are liable to ignore details and make things messy unless they are willing to be appreciated by others. They tend to quickly cram all things into a drawer. Why? You guess right. They do so to look “decent.” People living or working nearby can hardly find anything on the desk or in the drawer of such a person, yet they know what they are looking for “is just there.” A person with a high degree of influence is optimistic about human nature. One of the shortcomings of such a type of person is his or her unconditional trust on others, and his or her acceptance of other’s opinions on a selective basis, or acceptance of the idea that, in their optimistic view, can be turned into reality.',
            'hero_name' => '蜘蛛侠',
            'hero_name_en' => 'Spider man',
            'hero_desc' => '蜘蛛侠可以说是全世界人气最高的漫威超级英雄了！没有万贯家财、没有上古神器、没有天生使命，他比其他的英雄们都更接地气，蜘蛛侠就像活在我们身边的朋友一样真实。虽然弱小却从来没有害怕过，虽然穷却富有奉献精神，他用自己的信念影响了一代人，没有人会拒绝成为他的朋友。',
            'hero_desc_en' => 'Spider man is arguably the most popular super hero created by Marvel Comics! Backed by no family fortune or magic weapon passed down from ancient times, he is not a man born with mission, and is therefore more like an ordinary person than any other heroes. He is as real as any friend of yours and mine. He never feels fearful although he is weak and small, and he has a spirit of dedication although he is poor. He influences the people of one generation with his convictions, and he will never be rejected as a friend.',
            'icon' => 'Spider_man.jpg',
        ]);

        DB::table('heroes')->insert([
            'type' => 'B',
            'sex' => '2',
            'title' => 'Influence为影响型性格较为突出，其解释如下：',
            'title_en' => 'You have an influential personality. The explanations are as follows:',
            'explanations' => '影响度高者的沟通能力强，并对自己的社交能力很有自信。为了满足需要，他们经常利用极佳的口才说服他人共同合作。他们生性较乐观，会将大多数状况视为有利条件。他们非常外向，且以人为主，同时珍惜关系。他们喜欢人际接触频繁的环境，因为他们在任何时候都可以交朋友。影响型喜欢招待他人，懂得享受美食与餐厅气氛。这类人追求时髦，喜爱行动自由与物质享受。他们的工作环境友善、个人化且可激发创意。',
            'explanations_en' => 'People with a high degree of influence have a strong capability of communication, and are quite confident in their interpersonal skills. They often persuade others to cooperate with them with convincing words. Such people are optimistic, and regard most of the circumstances as favorable conditions. They are quite extroverted, take people first, and cherish the relationships with others. They are used to an environment characterized by frequent interpersonal contacts, where they can make friends at any time. They are willing to entertain others, and enjoy cuisines as well as the atmosphere in the restaurant. They always follow the fashion, like the freedom to take actions as well as material enjoyment. The work environment of such a type of person is friendly, personalized and can create innovative ideas.',
            'when_at_work' => '影响度高者的步调快速又即兴，除非他们想获得他人的赏识，否则一般而言他们会忽略细节，且杂乱无章。这类人会迅速把所有的东西塞进抽屉，为什么？没错，为了看来更「体面」。周遭居住或工作的人，几乎不可能从他们的桌子或档案.找到任何东西，可是，他们就是知道东西「就在这儿附近」。影响度高者天生对人性乐观，但其特质的缺点之一，就是对谁都信赖，且听他人说话，会选择性的听与自己想听的东西，或者自己乐观希望发生的部份。',
            'when_at_work_en' => 'People with a high degree of influence take actions in a fast tempo and in an impromptu way. They are liable to ignore details and make things messy unless they are willing to be appreciated by others. They tend to quickly cram all things into a drawer. Why? You guess right. They do so to look “decent.” People living or working nearby can hardly find anything on the desk or in the drawer of such a person, yet they know what they are looking for “is just there.” A person with a high degree of influence is optimistic about human nature. One of the shortcomings of such a type of person is his or her unconditional trust on others, and his or her acceptance of other’s opinions on a selective basis, or acceptance of the idea that, in their optimistic view, can be turned into reality.',
            'hero_name' => '钢铁侠',
            'hero_name_en' => 'Iron man',
            'hero_desc' => '钢铁侠是一个极其自我的人，特别是在一些大事上，他总会坚持自己的想法。不过在行事上，我们也看到了他成熟与幽默的一面。面对难题，他总会考虑的比别人要多一些，并会以幽默的方式表达出来，更巧妙的影响别人。虽然看似有点玩世不恭，甚至有话痨倾向，但他从来不会因为怕死而逃避责任，当大家遇到危险的时候，他总是身先士足，承担最危险的任务，带领大家战胜困难。',
            'hero_desc_en' => 'Iron man is extremely egoistic. In particular, he sticks to his own ideas when making important decisions. On the other hand, he is matured and humorous. When faced with a knotty problem, he always thinks more carefully than others and can influence others in a more skillful way by expressing his ideas in a humorous manner. A seemingly cynical and verbose man, he never shirks his duty despite that he may run the risk of his life. When people are threatened by a risk, he always takes the lead in assuming the most dangerous task and guides other people to overcome the difficulty.',
            'icon' => 'Iron_man.jpg',
        ]);

        DB::table('heroes')->insert([
            'type' => 'C',
            'sex' => '1',
            'title' => 'Steadiness为支持型性格较为突出，其解释如下：',
            'title_en' => 'You have a supportive personality. The explanations are as follows:',
            'explanations' => '稳健度处于曲线顶端的人，对大多数组织而言是「纯金」，因为他们不仅是忠诚的员工，也是可信赖的团队成员。他们是按部就班的逻辑思考者，喜欢为一个领袖或目标奋斗。稳健型偏爱稳定且可预测的环境，而需要改变时，他们会希望事先被告知。他们热爱长期的工作关系，以服务为导向，同时有耐心且和善，是一个能设身处地且富同情心的聆听者，他们真正关心他人的感觉和问题，在项目中尤其能扮演幕僚的角色。稳健度高者很谦虚，且在大部份情况下，刚开始时都不直接。（然而，若他们认为自己全盘了解状况，并已下定决心，顽强固执的个性就会出现！）如果你不同意他们的想法，并想加以说服，最好带着如山铁证。要他们改变之前，先给他们重新思考的时间和空间。',
            'explanations_en' => 'The people whose steadiness lies at the top of the curve are “pure gold” members in most of the organizations, because they are not only loyal workers but also reliable team members. They think in a step-by-step and logical way, and are willing to become leaders or achieve the goals they have been striving for. The people who have steady personality prefer stable and predictable environment, and when it is necessary to make changes, they hope they would be informed of such changes in advance. They are willing to maintain a long-term work relationship and engage in service-oriented works. They are patient, kind and sympathetic listeners. They really take into consideration the feelings and problems of other people, and play the role of advisors in a project. The people who have steady personality are modest, and would not express themselves frankly at the beginning in most of the cases. (However, they would show their stubbornness when they believe they have an understanding of the global picture and make up their minds!) If you do not agree with them, you have to try to persuade them with irrefutable evidence. You need to give them time and space for thinking again before they can make any change.',
            'when_at_work' => '',
            'when_at_work_en' => '',
            'hero_name' => '美国队长',
            'hero_name_en' => 'Captain America',
            'hero_desc' => '无论做什么，他都是为了正义，为了国家，为了人民而战的那个满腔热血的忠诚战士。美国队长坚信人性的善良和作为一个人而言的无限可能，因为就算世界都黑暗了，至少还有他自己清楚的认识人性之中的美好所带来的希望是会照亮前方路。当其他人在质疑中或多或少的偏离或躲避原本内心最直觉的判断，或是因为立场而做出妥协的时候，只有队长仍保有最初的坚持，不被任何事物所扰。',
            'hero_desc_en' => 'Whatever he does, Captain America does it for justice, the nation, and the people. He is a loyal soldier filled with enthusiasm. Captain America has full confidence in the kind aspect of human nature and the infinite potentials of a person. Even if the whole world is in the darkness, at least he himself is clearly aware that the hope brought by the kind aspect of the human nature will shine the road ahead. While others deviate from or dodge the judgment they make on their instinct more or less when they are challenged, or when they compromise because of their standpoint, Captain America still adheres to his original intention, and is free from any disturbance.',
            'icon' => 'Captain_America.jpg',
        ]);

        DB::table('heroes')->insert([
            'type' => 'C',
            'sex' => '2',
            'title' => 'Steadiness为支持型性格较为突出，其解释如下：',
            'title_en' => 'You have a supportive personality. The explanations are as follows:',
            'explanations' => '稳健度处于曲线顶端的人，对大多数组织而言是「纯金」，因为他们不仅是忠诚的员工，也是可信赖的团队成员。他们是按部就班的逻辑思考者，喜欢为一个领袖或目标奋斗。稳健型偏爱稳定且可预测的环境，而需要改变时，他们会希望事先被告知。他们热爱长期的工作关系，以服务为导向，同时有耐心且和善，是一个能设身处地且富同情心的聆听者，他们真正关心他人的感觉和问题，在项目中尤其能扮演幕僚的角色。稳健度高者很谦虚，且在大部份情况下，刚开始时都不直接。（然而，若他们认为自己全盘了解状况，并已下定决心，顽强固执的个性就会出现！）如果你不同意他们的想法，并想加以说服，最好带着如山铁证。要他们改变之前，先给他们重新思考的时间和空间。',
            'explanations_en' => 'The people whose steadiness lies at the top of the curve are “pure gold” members in most of the organizations, because they are not only loyal workers but also reliable team members. They think in a step-by-step and logical way, and are willing to become leaders or achieve the goals they have been striving for. The people who have steady personality prefer stable and predictable environment, and when it is necessary to make changes, they hope they would be informed of such changes in advance. They are willing to maintain a long-term work relationship and engage in service-oriented works. They are patient, kind and sympathetic listeners. They really take into consideration the feelings and problems of other people, and play the role of advisors in a project. The people who have steady personality are modest, and would not express themselves frankly at the beginning in most of the cases. (However, they would show their stubbornness when they believe they have an understanding of the global picture and make up their minds!) If you do not agree with them, you have to try to persuade them with irrefutable evidence. You need to give them time and space for thinking again before they can make any change.',
            'when_at_work' => '',
            'when_at_work_en' => '',
            'hero_name' => '蝙蝠侠',
            'hero_name_en' => 'Batman',
            'hero_desc' => '无论做什么，他都是为了正义，为了国家，为了人民而战的那个满腔热血的忠诚战士。美国队长坚信人性的善良和作为一个人而言的无限可能，因为就算世界都黑暗了，至少还有他自己清楚的认识人性之中的美好所带来的希望是会照亮前方路。当其他人在质疑中或多或少的偏离或躲避原本内心最直觉的判断，或是因为立场而做出妥协的时候，只有队长仍保有最初的坚持，不被任何事物所扰。',
            'hero_desc_en' => 'Whatever he does, Captain America does it for justice, the nation, and the people. He is a loyal soldier filled with enthusiasm. Captain America has full confidence in the kind aspect of human nature and the infinite potentials of a person. Even if the whole world is in the darkness, at least he himself is clearly aware that the hope brought by the kind aspect of the human nature will shine the road ahead. While others deviate from or dodge the judgment they make on their instinct more or less when they are challenged, or when they compromise because of their standpoint, Captain America still adheres to his original intention, and is free from any disturbance.',
            'icon' => 'Batman.jpg',
        ]);

        DB::table('heroes')->insert([
            'type' => 'D',
            'sex' => '1',
            'title' => 'Compliance为服从型性格较为突出，其解释如下：',
            'title_en' => 'You have a compliant personality. The explanations are as follows:',
            'explanations' => '尽忠职守、谨慎、遵守他人之规定。修正度高者与支配及影响型有很大的差异。他们天生精准且井然有序。由于他们思路清晰，只要知道正确的方向为何，就会受到激励，因此他们喜欢规矩和秩序。他们对自己和下属的要求都非常高。这类人遵守纪律，凡事讲求细节且维持高标准，不管作什么都要求完美。',
            'explanations_en' => 'A person of a compliant personality serves his job and duty faithfully, and observes the stipulations made by others. People who are proficient in making revisions are highly different from those who have dominant or influential personalities. They prefer preciseness, accuracy and orderliness. As they think things clearly, they would be given incentives so long as they know the right orientation. Therefore they prefer rules and orderliness. They set high demands for both themselves and their subordinates. People of this type observe disciplines, attend to details and maintain high standards in everything, and try to attain perfection at whatever they do.',
            'when_at_work' => '从就业的层面而言，他们是杰出的会计师、程序设计师及脑部外科医师。先试着从他
们「挑剔」的角度看看你的产品是否有问题，而且要比竞争对手抢先一步！在饮食方面，服从型会详读所有的标签，而且熟知食物中蛋白质、脂肪和碳水化合物的比例。他们喜欢精打细算，除非用具省钱且坚固，否则他们是不会买的。',
            'when_at_work_en' => 'When it comes to their employment, people of a compliant personality are outstanding accountants, program designers and brain surgeons. They would try to detect any problem in your products against their “stringent” standards, and always take actions one step ahead of their competitors! They would read carefully all the information in the labels attached to their food, and is therefore fully aware of the proportions of protein, fat and carbohydrate. They have a calculating mind, and would not purchase, say a kind of utensil, unless they find it cost-saving, sturdy and durable.',
            'hero_name' => '绿巨人',
            'hero_name_en' => 'Hulk',
            'hero_desc' => '班纳在没变成绿巨人之前是顶级科学家，压抑自己情感的天才，现有智力检测手段无法确定他的智商级别，在变成绿巨人之后，它虽然身体和性格都发生巨大的改变，但是在智力上可以说更进一步，在之后多次与钢铁侠一起做研究并且取得不错的成果。虽然变身后的绿巨人有时会丧失理性，但班纳在与其它英雄的配合中，确是个服从性强、善于听从意见的好伙伴。',
            'hero_desc_en' => 'Before becoming Hulk, Banner is a top-notch scientist. He is a genius who oppresses his own emotions and feelings, and his intelligence quotient cannot be measured by any existing intelligence test. Although he has changed greatly in terms of his body and personality after becoming Hulk, he has further developed his intelligence, and achieved satisfactory results in a number of researches he conducts along with Iron Man. Although he may sometimes lose his reason, Banner is a good partner as he knows how to be subordinated to others and accepts the opinions of others in his cooperation with other heroes.',
            'icon' => 'Hulk.jpg',
        ]);

        DB::table('heroes')->insert([
            'type' => 'D',
            'sex' => '2',
            'title' => 'Compliance为服从型性格较为突出，其解释如下：',
            'title_en' => 'You have a compliant personality. The explanations are as follows:',
            'explanations' => '尽忠职守、谨慎、遵守他人之规定。修正度高者与支配及影响型有很大的差异。他们天生精准且井然有序。由于他们思路清晰，只要知道正确的方向为何，就会受到激励，因此他们喜欢规矩和秩序。他们对自己和下属的要求都非常高。这类人遵守纪律，凡事讲求细节且维持高标准，不管作什么都要求完美。',
            'explanations_en' => 'A person of a compliant personality serves his job and duty faithfully, and observes the stipulations made by others. People who are proficient in making revisions are highly different from those who have dominant or influential personalities. They prefer preciseness, accuracy and orderliness. As they think things clearly, they would be given incentives so long as they know the right orientation. Therefore they prefer rules and orderliness. They set high demands for both themselves and their subordinates. People of this type observe disciplines, attend to details and maintain high standards in everything, and try to attain perfection at whatever they do.',
            'when_at_work' => '从就业的层面而言，他们是杰出的会计师、程序设计师及脑部外科医师。先试着从他
们「挑剔」的角度看看你的产品是否有问题，而且要比竞争对手抢先一步！在饮食方面，服从型会详读所有的标签，而且熟知食物中蛋白质、脂肪和碳水化合物的比例。他们喜欢精打细算，除非用具省钱且坚固，否则他们是不会买的。',
            'when_at_work_en' => 'When it comes to their employment, people of a compliant personality are outstanding accountants, program designers and brain surgeons. They would try to detect any problem in your products against their “stringent” standards, and always take actions one step ahead of their competitors! They would read carefully all the information in the labels attached to their food, and is therefore fully aware of the proportions of protein, fat and carbohydrate. They have a calculating mind, and would not purchase, say a kind of utensil, unless they find it cost-saving, sturdy and durable.',
            'hero_name' => '黑豹',
            'hero_name_en' => 'Black Panther',
            'hero_desc' => '黑豹是非洲国家瓦坎达的国王，在进食一种心型的药草后，获得了极为敏锐的五感、体力、智力、兽性、和对魔法的抵抗能力。凭借着冷静沉着的细腻心思，以及出色的科研、策略能力，他成为一名优秀的战术家、军事家、科学家。他忠于国家和人民，做每一个决定都是从人民、国家、人类的度去考虑，每一件事情都思路清晰井然有序，力求事事完美。',
            'hero_desc_en' => 'Black Panther is the king of the nation of Wakanda. After eating a kind of heart-shaped herb, he has acquired extremely keen senses of sight, hearing, taste, smell and touch, extraordinary physical strength and intelligence, brutish nature, and the capability of fighting against witchcraft. A calm and sober-minded person who has outstanding research and decision-making capabilities, he grows into an excellent tactician, military strategist and scientist. He is loyal to his nation and his people, and makes each decision for the interests of the people, the nation and humans. He pursues clear and order way of thinking in doing everything and strives to attain perfection in everything he does.',
            'icon' => 'Black_Panther.png',
        ]);

        return redirect('/admin/hero')->with('status', '导入成功');
    }
}
