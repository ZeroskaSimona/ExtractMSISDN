namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function countryCode()
    {
        return $this->hasOne('App\Phone');
    }
}