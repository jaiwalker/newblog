<?php 
/**
 * Class User
 *
 * @author Jai beschi Jai@Jaibeschi.com 
 * NOTE: big change I have made  moved this from the jai/authentication model 
 */
use Jai\Authentication\Models\User as AuthUser;


class User extends AuthUser
{
        
    public function comment()
	{
		return $this->hasMany('Comment');
	}
} 