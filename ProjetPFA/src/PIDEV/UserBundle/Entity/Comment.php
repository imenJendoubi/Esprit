<?php

namespace PIDEV\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Comment as BaseComment;
use FOS\CommentBundle\Model\SignedCommentInterface;
use FOS\CommentBundle\Model\VotableCommentInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Comment extends BaseComment implements SignedCommentInterface,VotableCommentInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Thread of this comment
     *
     * @var Thread
     * @ORM\ManyToOne(targetEntity="Thread")
     */
    protected $thread;

    /**
     * Sets the author of the Comment.
     *
     * @param UserInterface $author
     */
    protected $author;
    public function setAuthor(UserInterface $author)
    {
        // TODO: Implement setAuthor() method.
        $this->author = $author;
    }

    /**
     * Gets the author of the Comment.
     *
     * @return UserInterface
     */
    public function getAuthor()
    {
        // TODO: Implement getAuthor() method.
        return $this->author;
    }
    public function getAuthorName()
    {
        if (null === $this->getAuthor()) {
            return 'Anonymous';
        }

        return $this->getAuthor()->getUsername();
    }

    protected $score = 0;
    /**
     * Sets the score of the comment.
     *
     * @param int $score
     */
    public function setScore($score)
    {
        // TODO: Implement setScore() method.
        $this->score = $score;
    }

    /**
     * Returns the current score of the comment.
     *
     * @return int
     */
    public function getScore()
    {
        // TODO: Implement getScore() method.
        return $this->score;
    }

    /**
     * Increments the comment score by the provided
     * value.
     *
     * @param int $by
     *
     * @return int The new comment score
     */
    public function incrementScore($by = 1)
    {
        // TODO: Implement incrementScore() method.
        $this->score += $by;
    }
}