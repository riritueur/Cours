package resalSocial;

import java.util.ArrayList;

import facebookGhost.User;

public class MembreAutreReseau extends MembreAbstract implements User{

	public MembreAutreReseau(String nom, int age, String descr) {
		super(nom, age, descr);
	}

	@Override
	public String myProfil() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public String getId() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public String getName() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public AgeRange getAgeRange() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public ArrayList<User> getFriends() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void addFriend(User friend) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void addFamily(User familyMember) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public ArrayList<User> getFamily() {
		// TODO Auto-generated method stub
		return null;
	}

		
}
