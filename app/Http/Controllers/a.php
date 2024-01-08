<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Repositories\PageContentRepository;
use App\Repositories\DivisionRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProkerRepository;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    protected $pageContentRepository;
    protected $divisionRepository;
    protected $postRepository;
    protected $prokerRepository;

    public function __construct()
    {
        $this->pageContentRepository = new PageContentRepository;
        $this->divisionRepository = new DivisionRepository;
        $this->postRepository = new PostRepository;
        $this->prokerRepository = new ProkerRepository;
    }

    private function getPageContent($slug)
    {
        $pageContent = json_decode($this->pageContentRepository->findBySlug($slug)->data);

        if ($pageContent && is_object($pageContent)) {
            return (array) $pageContent->data;
        }

        // Handle ketika hasil dekode bukan objek atau null
        return [];
    }

    public function getHomepage()
    {
        $header = $this->getPageContent('header-homepage');
        $section2 = $this->getPageContent('section2-homepage');
        $section3 = $this->getPageContent('section3-homepage');
        $visionMission = $this->getPageContent('section-vision-mission');
        $gallery = $this->getPageContent('section-gallery-homepage');

        $prokers = $this->prokerRepository->get(
            null,
            [['status', '1']],
        );

        return view('frontpage.modules.beranda', compact([
            'header',
            'section2',
            'section3',
            'visionMission',
            'prokers',
            'gallery',
        ]));
    }

    public function getAbout()
    {
        $header = $this->getPageContent('header-about');
        $slogan = $this->getPageContent('section-slogan');
        $visionMission = $this->getPageContent('section-vision-mission');

        return view('frontpage.modules.tentang', compact([
            'header',
            'slogan',
            'visionMission'
        ]));
    }

    public function getPengurus()
    {
        $header = $this->getPageContent('header-pengurus');
        $divisions = $this->divisionRepository->getParent();
        return view('frontpage.modules.pengurus', compact([
            'header',
            'divisions',
        ]));
    }

    public function getProker()
    {
        $header = $this->getPageContent('header-proker');
        $prokers = $this->prokerRepository->get(
            null,
            [['status', '1']],
        );
        return view('frontpage.modules.proker', compact([
            'header',
            'prokers',
        ]));
    }

    public function showProker($id)
    {
        $proker = $this->prokerRepository->findById($id);
        return view('frontpage.modules.proker-show', compact('proker'));
    }

    public function getBerita(Request $request)
    {
        $filter = [['title', 'LIKE', "%$request->q%"]];
        $filter2 = [['body', 'LIKE', "%$request->q%"]];
        $limit = $request->limit ?? 8;

        $posts = $this->postRepository->get($limit, $filter, $filter2);
        return view('frontpage.modules.berita-index', compact('posts'));
    }

    public function showBerita($slug)
    {
        $post = $this->postRepository->findBySlug($slug);
        $otherPosts = $this->postRepository->get(4, [['id', '!=', $post->id]]);

        if ($post) {
            return view('frontpage.modules.berita-show', compact([
                'post',
                'otherPosts'
            ]));
        } else {
            abort(404);
        }
    }
}
