<?php

namespace SmartCore\Bundle\BlogBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

trait TagTrait
{
    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles", cascade={"persist"})
     * @ORM\JoinTable(name="blog_articles_tags_relations",
     *      joinColumns={@ORM\JoinColumn(name="article_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id")}
     * )
     *
     * @var TagInterface[]|ArrayCollection|null
     */
    protected $tags;

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag)
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
            //$tag->increment();
        }

        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function removeTag(Tag $tag)
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            //$tag->decrement();
        }

        return $this;
    }

    /**
     * @param TagInterface[]|ArrayCollection $tags
     * @return $this
     */
    public function setTags($tags)
    {
        /*
        foreach ($this->tags as $tag) {
            $tag->decrement();
        }

        foreach ($tags as $tagNew) {
            $tagNew->increment();
        }
        */

        $this->tags = $tags;

        return $this;
    }

    /**
     * @return Tag[]|ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
