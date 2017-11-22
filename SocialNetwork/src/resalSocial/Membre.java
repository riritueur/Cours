package resalSocial;

import java.util.HashMap;

import grapheX.Sommet;
import reseauSocial.core.MemberInterface;

public class Membre extends MembreAbstract implements MemberInterface{
	
	HashMap<Membre, Integer> relations = new HashMap<Membre, Integer>();
	
	public Membre(String nom, int age, String descr){
		super(nom,age,descr);
	}

	
}
