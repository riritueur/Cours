package resalSocial;

import grapheX.Sommet;
import reseauSocial.core.MemberInterface;

public abstract class MembreAbstract extends Sommet implements MemberInterface{

	private String nom;
	private int age;
	private String descr;

	public MembreAbstract(String nom, int age, String descr){
		super(nom);
		this.nom = nom;
		this.age = age;
		this.descr = descr;
	}
	
	@Override
	public int getAge() {
		return age;
	}

	@Override
	public String getDescription() {
		return descr;
	}

	@Override
	public String ident() {
		return nom;
	}
}
